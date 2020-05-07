<template>
    <ul class="px-2">
       <div v-cloak v-if="friends.data">
           <li v-for="(friend, index) in friends.data" class="mb-4">
               <div>
                   <a :href="'/profiles/'+friend.username" class="flex items-center">
                       <img :src="friend.avatar" alt="user's avater" class="rounded-full mr-2 w-10 h-10 ">
                        {{friend.name}}
                   </a>
               </div>
           </li>
       </div>

        <li v-else class="mb-4">No friends Yet!</li>

    </ul>
</template>


<script>
    export  default {
        name: 'friend-list',
        data:() => ({
            friends: {}
        }),
        created() {
            this.getFriends()
        },
        methods: {
            getFriends() {
                axios.get('/friends').then(
                    response => {
                        this.friends = response.data
                    }
                ).catch(error=>console.log(error))
            }
        }

    }

</script>
