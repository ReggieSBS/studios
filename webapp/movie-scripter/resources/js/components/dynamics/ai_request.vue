<script setup>

    import {reactive} from "vue"

    const input = reactive({
        request: ""
    })

    const writeRequest = () => {
        axios.post('/ai-request', input)
    }

</script>
<template>
<div class="container">
    <div class="row">
        <div class="col-9 pl-2 p-0">
            <input type="text" name="request" id="request" class="form form-control" placeholder="Ask ai.." v-model="input.request" required>
        </div>
        <div class="col-3 p-0">
            <button type="button" class="btn btn-success" id="btnrequest" @click="writeRequest"><i class="mdi mdi-18px mdi-send"></i></button>
        </div>
    </div>
</div>
</template>