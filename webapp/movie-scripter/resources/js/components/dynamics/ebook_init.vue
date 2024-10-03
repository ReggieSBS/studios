<script>
    import {reactive, ref, onMounted} from "vue"
    import { Editor, EditorContent } from '@tiptap/vue-3'
    import StarterKit from '@tiptap/starter-kit'

    export default {
    components: {
      EditorContent,
    },

    data() {
      return {
        editor: null,
      }
    },

    mounted() {
      this.editor = new Editor({
        content: '<p>I’m running Tiptap with Vue.js. 🎉</p>',
        extensions: [StarterKit],
      })
    },

    beforeUnmount() {
      this.editor.destroy()
    },
  }

</script>
<template>
    <editor-content :editor="editor" />
</template>