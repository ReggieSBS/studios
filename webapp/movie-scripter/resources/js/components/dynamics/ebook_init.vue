


<script>
    import {reactive, ref, onMounted, defineProps } from "vue"

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

    const input = reactive({
        request: ""
    })


    export default {

      props: ['responses'],

      components: {
        EditorContent,
      },

      data() {
        return {
          content: null,
        }
      },

      methods: {
        
        async loadAsyncFunctions() {
          await this.delay(2000); // Delay for 1 second
          await this.loadContent();
          await this.delay(2000); // Delay for 2 seconds
        },

        async delay(ms) {
          return new Promise(resolve => setTimeout(resolve, ms));
        },

        synchronousFunction() {
          console.log('This function is called synchronously');
        },

        async asyncFunction() {
          console.log('This function is called asynchronously');
        },

        addImage() {
          const url = window.prompt('URL')

          if (url) {
            this.editor.chain().focus().setImage({ src: url }).run()
          }
        },
        async loadContent() {
          this.editor.chain().focus().setContent(this.responses).run()
        }
      },

      created(){
      },

      mounted() {
        this.editor = new Editor({
          onUpdate({ editor }) {
            var value = editor.getHTML();
            const data = { value: value };
            axios.post('/ebook-content/update', data)
            .then(
                response => console.log(response.data)
            ).catch(
                error => console.log(error)
            )
          },
          content:"",
          extensions: 
          [
            StarterKit,
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
        },
      );
        
        this.synchronousFunction();
        this.loadAsyncFunctions();
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

          <td><button class="editor-btn bg-primary text-white" @click="loadContent" data-bs-toggle="tooltip" title="Load content"><span class="mdi mdi-refresh"></span></button></td>

          </tr>
          
      </table>
  </div>
  <div class="editor-body">
      <editor-content :editor="editor"/>
  </div>
</template>
