<script setup>
    import {reactive, ref, onMounted} from "vue"
    import ChapterForm from './dynamics/chapter_init.vue'

    let responses = ref()
    let metadatatitle = ref()
    let metadatachapternumber = ref()

    const input = reactive({
        request: ""
    })

    onMounted(async() =>{
        getChapterContent();
        getChapterMetaData();
    })

    const getChapterMetaData = async () => {
        let getdata = await axios.get ('/chapter-data')
            .then((getdata) => {
                metadatatitle.value = getdata.data.title,
                metadatachapternumber.value = getdata.data.chapter_number
            })
    }
    JSON.stringify(metadatatitle);
    JSON.stringify(metadatachapternumber);



    const getChapterContent = async () => {
        let response = await axios.get ('/chapter-content')
            .then((response) => {
                responses.value = response.data.responses
            })
    }
    JSON.stringify(responses);


    const updateChapternumber = e => {
        if (e.target.value != '' && e.target.value > 0){ updatenr(e.target.value) }else{ alert("chapter number should be higher then 0"); }
    }



    function updatenr(value) {
        const data = { value: value };
        axios.post('/chapter-data/update-chapternr', data)
        .then(
            response => console.log(response.data)
        ).catch(
            error => console.log(error)
        )
    }

    const updateChapterTitle = e => {
        if (e.target.value != ''){ updatetitle(e.target.value) }else{ alert("Please enter a title for this chapter"); }
    }

    function updatetitle(value) {
        const data = { value: value };
        axios.post('/chapter-data/update-chaptertitle', data)
        .then(
            response => console.log(response.data)
        ).catch(
            error => console.log(error)
        )
    }


</script>

<template>  
    <div class="clearfix">
      <h4 class="card-title float-start">
        <table style="width:60%; float:left;">
          <Tr>
            <Td class="pr-5" style="vertical-align: middle;">Chapter</Td>
            <Td class="pr-5"><input type="number" class="form form-control" style="width:80px;" :value="metadatachapternumber" @change="updateChapternumber" @input="updateChapternumber"></Td>
            <Td class="pr-5"><input type="text" class="form form-control" placeholder="Type here the chapter title.." :value="metadatatitle" @change="updateChapterTitle" @input="updateChapterTitle"></Td>


          </Tr>
        </table>
        <table style="width:30%; float:right;">
            <tr>
                <td>
                    <div class="nav-profile-img" bis_skin_checked="1">
                    <img src="http://127.0.0.1:8000/images_webapp/faces/face1.jpg" width="40" style="border-radius:50%;" alt="profile">
                    <span class="availability-status online"></span>
                    </div>
                </td>
                <td>
                    <div class="nav-profile-img" bis_skin_checked="1">
                    <img src="http://127.0.0.1:8000/images_webapp/faces/face1.jpg" width="40" style="border-radius:50%;" alt="profile">
                    <span class="availability-status online"></span>
                    </div>
                </td>
                <td>
                    <div class="nav-profile-img" bis_skin_checked="1">
                    <img src="http://127.0.0.1:8000/images_webapp/faces/face1.jpg" width="40" style="border-radius:50%;" alt="profile">
                    <span class="availability-status online"></span>
                    </div>
                </td>
            </tr>
        </table>
      </h4>
    </div>
    <ChapterForm :responses="responses"/>
</template>

