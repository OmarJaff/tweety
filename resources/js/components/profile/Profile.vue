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
                <div class="space-x-2 flex ">

                    <slot></slot>

                </div>
            </div>
            <div v-if="editable" class="flex flex-col items-center">
                <div v-if="this.bio.length" class="items-center w-1/2 ">
                    <p class="text-sm p-2 my-4  items-center text-center text-gray-600">{{this.bio}}</p>
                    <div class="flex space-x-2">
                        <button v-if="!bioFieldShowed" @click="showBioField()"
                                class="text-sm text-gray-600 border-b-2  hover:border-blue-400 focus:outline-none outline-none justify-center flex items-center w-full">
                            Edit bio
                        </button>
                        <button v-if="!bioFieldShowed" @click="handleRemoveBio()"
                                class="text-sm text-gray-600 border-b-2  hover:border-red-400 focus:outline-none outline-none justify-center flex items-center w-full">
                            Remove bio
                        </button>
                    </div>
                </div>
                <div v-else class="flex w-full items-center transition translate-y-3 p-2 m-4 w-full justify-center">
                    <button v-if="!bioFieldShowed" @click="showBioField()"
                            class="text-gray-600 border-b-2  hover:border-blue-400 focus:outline-none outline-none justify-center flex items-center w-1/2">
                        Add bio
                    </button>
                </div>
                <div v-if="bioFieldShowed"
                     class="flex w-full items-center transition translate-y-3 p-2 m-4 w-full justify-center">
                    <form @submit.prevent="handleBioSubmite()"
                          class="flex w-full items-center transition translate-y-3 p-2 m-4 w-full justify-center">
                                    <textarea @keyup='charCount()' v-model="bio" type="textarea"
                                              placeholder="write your bio here"
                                              name="bio"
                                              id="bio"
                                              class="w-full border-gray-300 border-b-2 w-full focus:outline-none outline-none focus:border-blue-400"
                                              maxlength="200">
                                   </textarea>

                        <button
                            class="
                                  absolute
                                  right-0 text-sm text-gray-400 mx-8 focus:outline-none transition -translate-y-4"
                            :class="totalCharacter > 0 ? 'text-gray-700  rounded-full px-2 py-1 shadow hover:bg-gray-100' : ''"
                            :disabled="totalCharacter > 0 ? false : true" type="submit"
                        >Save Bio
                        </button>
                        <button
                            class="
                                  absolute
                                  right-0 text-sm  mx-24 focus:outline-none transition -translate-y-4
                                  text-gray-700 px-3 py-1 btn-link "

                            @click="cancleBio()"
                        >Cancle
                        </button>
                    </form>
                    <span
                        class="flex-shrink-0 mx-2 text-gray-500 bottom-0 transition translate-y-4 text-sm absolute right-0">{{ totalCharacter }} / 200</span>
                </div>
            </div>
            <div v-else-if="user.bio" class="flex justify-center">
                <p class="text-sm p-2 my-4  items-center text-center text-justify text-gray-600">
                    {{this.bio}}
                </p>

            </div>

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
            },
            editable: {
                required: true
            }
        },
        data: () => ({
            userInfo: '',
            title: 'this is title',
            bio: '',
            totalCharacter: 0,
            bioFieldShowed: false

        }),
        created() {
            this.getUserBio()

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
            getUserBio() {
                axios.get(`/bio/${this.user.username}`).then((response) => {
                    this.clearifyBio(response.data)
                }).catch(error => console.log(error))
            },

            charCount() {
                this.totalCharacter = this.bio.length;
            },

            showBioField() {
                this.bioFieldShowed = true;
            },

            handleBioSubmite() {
                axios.patch(`/bio/${this.user.username}/edit`, {bio: this.bio}).then((response) => {
                    this.getUserBio(),
                        this.bioFieldShowed = false
                }).catch(error => console.log(error))
            },

            clearifyBio(userBio) {
                if (userBio.length) {
                   return  this.bio = userBio;
                }
                return this.bio = ""
            },

            handleRemoveBio() {
                axios.delete(`/bio/${this.user.username}/delete`).then(() => {
                    this.getUserBio();
                }).catch(error => console.log(error))
            },

            cancleBio() {
                this.bioFieldShowed = false;
             }
        }
    }
</script>
