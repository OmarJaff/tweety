<template>
    <div>
        <header class=" relative mb-8 relative">
            <div class=" relative ">

                <img class="w-full fill-current rounded-lg object-cover mb-2 h-48" src="/images/coverphoto.jpg"
                     alt="cover photo">
                <img :src="user.avatar" alt="user's avatar"
                     class="
                         rounded-full w-32 h-32
                         bottom-0
                         border-2
                         border-white
                         object-cover
                         absolute
                         -mb-16
                         -translate-x-1/2"
                     style="left:50%">

            </div>


            <div class="flex  justify-between items-center">
                <div style="max-width: 270px">
                    <h2 class="font-bold text-2xl">{{user.name}}</h2>
                    <p class="text-sm">Joined {{user.created_at | diffForHumans}}</p>
                </div>
                <div class="space-x-2 flex">

                    <slot></slot>


                    <div :class="this.isCurrentUser ? 'hidden' : ''">
                        <follow-button :name="user.name" :userName="user.username"></follow-button>
                    </div>

                </div>
            </div>

            <p class="text-xs p-2 my-4  items-center text-center text-justify text-gray-600">Lorem ipsum dolor sit amet,
                consectetur adipisicing elit. Deleniti dignissimos, distinctio dolores enim explicabo id iusto natus non
                officia officiis omnis placeat possimus quidem quod suscipit tempore veniam veritatis voluptas</p>
        </header>

    </div>
</template>

<style>
    @import '~animate.css';
</style>

<script>

    export default {
        components: {},
        props: {
            user: {required: true},
            isCurrentUser: {
                default: () => {
                }, required: true
            }
        },
        data: () => ({}),
        created() {

        },
        filters: {
            diffForHumans: (date) => {
                if (!date) {
                    return null;
                }

                return dayjs(date).fromNow();
            }
        },
        methods: {
            getUserData() {
                axios.get()
            },
        }
    }
</script>
