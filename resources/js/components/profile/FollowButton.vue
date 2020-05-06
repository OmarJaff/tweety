<template>
    <form @submit.prevent="follow()">

        <button type="submit" class="hover:bg-blue-600 focus:outline-none outline-none bg-blue-500 shadow px-4 py-2 rounded-full text-white text-xs">
            {{this.isFollowing ? this.isFollowing : 'follow'}}
        </button>

        <follow-alert :closed="closed" :name="name"  :followedUser="followedUser"></follow-alert>
        <unfollow-alert :closed="closed" :name="name" :followedUser="followedUser"></unfollow-alert>
    </form>
</template>


<script>
    export default {
        props: {
            userName: {required: true},
            isCurrentUser: {},
            name: {required: true}
        },
        data: () => ({
            isFollowing: "",
            followedUser: "",
            closed: false,
        }),
        beforeCreate() {

        },
        created() {
            this.following()
        },
        mounted() {

        },
        methods: {
            follow() {
                axios.post(`/profiles/${this.userName}/follow`).then((response) =>
                    this.following(),
                    this.followFlashMessage(),
                    setTimeout(() => {
                        this.closed = true;
                    }, 2000),
                ).catch(error => console.error(error))
            },

            following() {  axios.get(`/profiles/${this.userName}/follow`).then(
                (response) => this.isFollowing = response.data
            ).catch(error => console.error(error)) },

            followFlashMessage() {
                if(this.isFollowing === "follow") {
                    return this.followedUser = true
                }
                return  this.followedUser = false
            }
        }
    }
</script>
