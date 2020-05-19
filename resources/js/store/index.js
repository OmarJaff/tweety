export default {
    state: {
        disabled: false,
    },

    getters: {
        buttonState: (state) => {
            return state.disabled;
        }

    },

    actions: {

    },

    mutations: {
        enableTweetButton (state, val) {
            state.disabled = val
        }
    }
}
