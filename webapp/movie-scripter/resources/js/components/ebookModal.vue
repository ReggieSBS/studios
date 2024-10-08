<script setup>
    import {reactive, ref, onMounted} from "vue"
    import EbookForm from './dynamics/ebook_init.vue'

    let responses = ref()

    onMounted(async() =>{
        getEbookContent()
    })

    const getEbookContent = async () => {
        let response = await axios.get ('/ebook-content')
            .then((response) => {
                responses.value = response.data.responses
            })
    }
    JSON.stringify(responses);


</script>

<template>  
    <EbookForm :responses="responses"/>
    
</template>

