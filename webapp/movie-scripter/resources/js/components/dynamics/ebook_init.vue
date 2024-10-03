<script>
    import {reactive, ref, onMounted} from "vue"
    import { Editor, EditorContent } from '@tiptap/vue-3'
    import StarterKit from '@tiptap/starter-kit'
    import Text from '@tiptap/extension-text'
    import TextStyle from '@tiptap/extension-text-style'
    import Dropcursor from '@tiptap/extension-dropcursor'
    import Image from '@tiptap/extension-image'
    import Bold from '@tiptap/extension-bold'
    import Italic from '@tiptap/extension-italic'
    import ListItem from '@tiptap/extension-list-item'
    import Underline from '@tiptap/extension-underline'
    import Document from '@tiptap/extension-document'
    import Paragraph from '@tiptap/extension-paragraph'
    import Heading from '@tiptap/extension-heading'

    export default {
      components: {
        EditorContent,
      },

      data() {
        return {
          editor: null,
        }
      },

      methods: {
        addImage() {
          const url = window.prompt('URL')

          if (url) {
            this.editor.chain().focus().setImage({ src: url }).run()
          }
        },
      },

      mounted() {
        this.editor = new Editor({
          content: '<p>I’m running Tiptap with Vue.js. 🎉</p>',
          extensions: [StarterKit,
          Document,
          Paragraph,
          Text,
          Image,
          Dropcursor,
          TextStyle,
          Bold,
          Underline,
          Italic,
          Heading.configure({
            levels: [1, 2, 3, 4],
          })
          ],
        })
      },
      beforeUnmount() {
        this.editor.destroy()
      },
    }

</script>
<template>
    <div class="editor-buttons">
        <table>
            <tr>
            <td><button class="editor-btn bg-default text-white" @click="editor.chain().focus().toggleBold().run()"  style="font-weight: bold;">B</button></td>
            <td><button class="editor-btn bg-default text-white" @click="editor.chain().focus().toggleItalic().run()"><em>I</em></button></td>
            <td><button class="editor-btn bg-default text-white" @click="editor.chain().focus().toggleUnderline().run()" style="text-decoration: underline;">Underline</button></td>
     
            <td><button class="editor-btn bg-default text-white" @click="editor.chain().focus().toggleHeading({ level: 1 }).run()">h1</button></td>
     
            <td><button class="editor-btn bg-default text-white" @click="editor.chain().focus().toggleHeading({ level: 2 }).run()">h2</button></td>
     
            <td><button class="editor-btn bg-default text-white" @click="editor.chain().focus().toggleHeading({ level: 3 }).run()">h3</button></td>
   
            <td><button class="editor-btn bg-default text-white" @click="editor.chain().focus().toggleHeading({ level: 4 }).run()">h4</button></td>
            
            <td><button class="editor-btn bg-default text-white" @click="editor.chain().focus().toggleBulletList().run()"><span class="fa fa-list-ul"></span></button></td>

            <td><button class="editor-btn bg-default text-white" @click="addImage"><span class="mdi mdi-image"></span></button></td>

            </tr>
            
        </table>
    </div>
    <div class="editor-body">
        <editor-content :editor="editor" />
    </div>
</template>

