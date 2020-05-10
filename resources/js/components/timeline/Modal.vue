<template>
    <div
        id="submitmodal"
        class="  fixed
    inset-0 flex z-50 justify-center" style="background-color: rgba(0, 0, 0, 0.678);">

        <div
            class="inset-auto  z-50 flex flex-col xl:w-1/4
      max-h-full justify-end w-full  md:w-auto md:justify-center">
            <div
                class="flex flex-col  w-full bg-white
        shadow-lg md:rounded-lg p-2 max-h-full  md:my-4 overflow-auto">
                <div class="border-b border-gray-lighter p-1 flex justify-between">
                    <h2>{{title}}</h2>

                    <button @click="$emit('close')">
                        <svg
                            class="h-8 w-8 text-gray-dark hover:text-gray-darker fill-current"
                            viewBox="0 0 24 24">
                            <path
                                class="heroicon-ui"
                                d="M16.24 14.83a1 1 0 01-1.41 1.41L12 13.41l-2.83 2.83a1 1 0
                01-1.41-1.41L10.59 12 7.76 9.17a1 1 0 011.41-1.41L12
                10.59l2.83-2.83a1 1 0 011.41 1.41L13.41 12l2.83 2.83z"/>
                        </svg>
                    </button>
                </div>

                <div class="my-2 p-1 mx-4 overflow-auto font-bold text-xl text-gray-700 ">
                    <slot></slot>
                </div>

                <div class="my-2 p-1 flex w-full justify-end">
                    <slot name="footer"></slot>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
    export default {
        name: "modal",
        props: {
            title: {type: String}
        }
    }
</script>

