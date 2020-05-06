<template>
    <transition name="slide">
        <div
            v-if="followedUser === false"
            class="animated bounceInRight  bg-blue-200 rounded-lg fixed flex delay-2s mx-6  inset-0 left-auto top-auto my-12  transition-opacity ease-in duration-1000 opacity-100' "
            :class="this.closed ? 'bounceOutRight' : ''">
            <div class="mr-4 p-2  flex items-center">
                <div class="flex">
                    <div
                        class=" text-blue-800 font-medium p-2  text-lg">You Unfollowed {{name}}
                    </div>
                </div>
                <div class="flex-1">
                    <svg class="text-blue-700 fill-current" width="24" height="24" viewBox="0 0 24 24"
                         fill="currentColor">
                        <path
                            d="M13 7C13 9.20914 11.2091 11 9 11C6.79086 11 5 9.20914 5 7C5 4.79086 6.79086 3 9 3C11.2091 3 13 4.79086 13 7Z"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9 14C5.68629 14 3 16.6863 3 20V21H15V20C15 16.6863 12.3137 14 9 14Z"
                              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M21 12H15" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>
        </div>
    </transition>
</template>

<style>


    .slide-out-right {
        -webkit-animation: slide-out-right 0.5s cubic-bezier(0.550, 0.085, 0.680, 0.530) both;
        animation: slide-out-right 0.5s cubic-bezier(0.550, 0.085, 0.680, 0.530) both;
    }



    @-webkit-keyframes slide-out-right {
        0% {
            -webkit-transform: translateX(0);
            transform: translateX(0);
            opacity: 1;
        }
        100% {
            -webkit-transform: translateX(1000px);
            transform: translateX(1000px);
            opacity: 0;
        }
    }
    @keyframes slide-out-right {
        0% {
            -webkit-transform: translateX(0);
            transform: translateX(0);
            opacity: 1;
        }
        100% {
            -webkit-transform: translateX(1000px);
            transform: translateX(1000px);
            opacity: 0;
        }
    }

    .slide-in-right {
        -webkit-animation: slide-in-right 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        animation: slide-in-right 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
    }

    @-webkit-keyframes slide-in-right {
        0% {
            -webkit-transform: translateX(1000px);
            transform: translateX(1000px);
            opacity: 0;
        }
        100% {
            -webkit-transform: translateX(0);
            transform: translateX(0);
            opacity: 1;
        }
    }
    @keyframes slide-in-right {
        0% {
            -webkit-transform: translateX(1000px);
            transform: translateX(1000px);
            opacity: 0;
        }
        100% {
            -webkit-transform: translateX(0);
            transform: translateX(0);
            opacity: 1;
        }
    }
</style>

<script>


    export default {
        props:{
            followedUser: {required:true},
            name: {type:String, required:true},
            closed: {type:Boolean, required: true, default: () => {}}
        },
    }
</script>
