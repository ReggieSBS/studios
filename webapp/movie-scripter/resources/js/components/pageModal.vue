<script setup>
    import {reactive, ref, onMounted} from "vue"
    import PageForm from './dynamics/page_init.vue'

    let responses = ref()

    onMounted(async() =>{
        getPageContent()
    })

    const getPageContent = async () => {
        let response = await axios.get ('/page-content')
            .then((response) => {
                responses.value = response.data.responses
            })
    }
    JSON.stringify(responses);


</script>

<template>  
    <PageForm :responses="responses"/>
    
</template>

