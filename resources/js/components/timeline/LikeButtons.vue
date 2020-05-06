<template>
    <form @submit.prevent="like(tweetID)">
        <div
            class="flex items-center space-x-4">
            <div class="flex items-center">
                <button type="submit"
                        class="text-xs  flex outline-none focus:outline-none"
                        :class=" isLikedBy ? 'text-blue-500' : 'text-gray-600'">
                    <svg class=" fill-current   mr-1 w-4" viewBox="0 0 20 20" version="1.1"
                         xmlns="http://www.w3.org/2000/svg">
                        <g class="fill-current" id="Page-1" stroke="none" stroke-width="1" fill="none"
                           fill-rule="evenodd">
                            <g id="icon-shape">
                                <path
                                    d="M11.0010436,0 C9.89589787,0 9.00000024,0.886706352 9.0000002,1.99810135 L9,8 L1.9973917,8 C0.894262725,8 0,8.88772964 0,10 L0,12 L2.29663334,18.1243554 C2.68509206,19.1602453 3.90195042,20 5.00853025,20 L12.9914698,20 C14.1007504,20 15,19.1125667 15,18.000385 L15,10 L12,3 L12,0 L11.0010436,0 L11.0010436,0 Z M17,10 L20,10 L20,20 L17,20 L17,10 L17,10 Z"
                                    id="Fill-97"></path>
                            </g>
                        </g>
                    </svg>
                </button>
                <span>{{likesNumber ? likesNumber : 0}}</span>
            </div>
        </div>
    </form>
</template>

<script>
    export default {
        name: 'like-buttons',
        props: {
            tweetID: {required: true},
             likesNumber: {required: true}
        },
        data: () => ({
            isLikedBy: ''
        }),
        created() {
          this.isLikedByUser();
        },
        // watch: {
        //     likesNumber: function() {
        //         this.isLikedByUser();
        //     }
        // },
        methods:
            {

                like(tweetID) {
                    this.$emit('like', tweetID)
                },
                isLikedByUser()
                {
                    // axios.get(`/tweets/${this.userID}/like`).then((response) => {
                    //     this.isLikedBy = response.data ? true : false;
                    // } ).catch(error=>console.log(error))
                }
            }

    }
</script>
