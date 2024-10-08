<script setup>

    import {reactive, ref, onMounted} from "vue"

    const input = reactive({
        request: ""
    })

    const writeRequest = () => {
        axios.post('/ai-request', input);
        // to keep less line code structure initiated jQuery to clear input on id
        $("#request").val("");
        getAiResponses();
    }
        
    let responses = ref([])

    onMounted(async() =>{
        getAiResponses()
    })

    const getAiResponses = async () => {
        let response = await axios.get ('/ai-response')
            .then((response) => {
                responses.value = response.data.responses
            })
    }

</script>
<template>

<!-- Modal body -->
<div class="modal-body">
    <div class="container" v-for="response in responses" :key="response.id">
        <div class="row">
            <div class="request-balloon col-10" v-if="response.request == 1">
                <small><i class="mdi mdi-account"></i> You:</small>
                <hr>
                <div class="ai-message">{{ response.message }}</div>
            </div>
            <div class="response-balloon col-10" v-if="response.response == 1">
                <small><i class="mdi mdi-robot"></i> Mosci:</small>
                <div class="ai-message">{{ response.message }}</div>
            </div>
        </div>
    </div>
</div>

<!-- Modal footer -->
<div class="modal-footer">
    <div class="container">
        <div class="row">
            <div class="col-9 pl-2 p-0">
                <input type="text" name="request" id="request" class="form form-control" placeholder="Ask ai.." v-model="input.request" ref="request" required>
            </div>
            <div class="col-3 p-0">
                <button type="button" class="btn btn-success" id="btnrequest" @click="writeRequest"><i class="mdi mdi-18px mdi-send"></i></button>
            </div>
        </div>
    </div>
</div>
</template>