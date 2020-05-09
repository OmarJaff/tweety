<template>
        <div
            class="bg-blue-200 animated bounceInRight rounded-lg
             fixed flex delay-2s mx-6  inset-0 left-auto top-auto my-12
              transition-opacity ease-in duration-1000 opacity-100' "
            :class="this.closed ? 'animated bounceOutRight' : ''"
        >
            <div class="mr-4 p-2  flex items-center">
                <div class="flex">
                    <div
                        class=" text-blue-800 font-medium p-2  text-lg">
                        <slot></slot>
                    </div>
                </div>
                <div class="flex-1">
                    <svg class="text-blue-700 fill-current" width="20" height="20" viewBox="0 0 20 20"
                         fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M16 7V10V7ZM16 10V13V10ZM16 10H19H16ZM16 10H13H16ZM11 5C11 7.20914 9.2091 9 7 9C4.79086 9 3 7.20914 3 5C3 2.79086 4.79086 1 7 1C9.2091 1 11 2.79086 11 5ZM1 18C1 14.6863 3.68629 12 7 12C10.3137 12 13 14.6863 13 18V19H1V18Z"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>
        </div>
</template>

<style>

    .fade-enter-active {
        -webkit-animation: slide-in-right 0.3s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        animation: slide-in-right 0.3s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
    }

    @-webkit-keyframes fade-enter-active {
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

    @keyframes fade-enter-active {
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
        props: {
          },

        data: ()=> ({
           closed: false
        }),

        created() {

                 setTimeout(() => {
                    this.closed = true;
                }, 1000)
            }


    }
</script>
