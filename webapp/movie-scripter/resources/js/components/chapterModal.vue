<script setup>
    import {reactive, ref, onMounted} from "vue"
    import ChapterForm from './dynamics/chapter_init.vue'

    let responses = ref()

    onMounted(async() =>{
        getChapterContent()
    })

    const getChapterContent = async () => {
        let response = await axios.get ('/chapter-content')
            .then((response) => {
                responses.value = response.data.responses
            })
    }
    JSON.stringify(responses);


</script>

<template>  
    <ChapterForm :responses="responses"/>
    
</template>

