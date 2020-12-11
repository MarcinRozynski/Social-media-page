<template>
    <div class="container">
        <p id="success"></p>
       <a @click.prevent="likePost" href="http://"><i  class="fa fa-thumbs-up" aria-hidden="true"></i>({{ totallike }})</a>
    </div>
</template>

<script>
    export default {
        props:['post'],
        data(){
            return {
                totallike:'',
            }
        },
        methods:{
            likePost(){
                axios.post('/like/'+this.post)
                .then(response =>{
                    this.getlike()
                    $('#success').html(response.data.message)
                })
                .catch()
            },
            getlike(){
                axios.get('/like/'+this.post)
                .then(response =>{
                    this.totallike = response.data.count;
                })
            }
        },
        mounted() {
            this.getlike()
        }
    }
</script> 