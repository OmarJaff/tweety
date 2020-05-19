/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


import Vue from 'vue';


window.TurbolinksAdapter = require('vue-turbolinks');


const Turbolinks = require("turbolinks");


window.dayjs = require('dayjs');
window.relativeTime = require('dayjs/plugin/relativeTime')


dayjs.extend(relativeTime);

Turbolinks.start();

const bodyScrollLock = require('body-scroll-lock');
window.disableBodyScroll = bodyScrollLock.disableBodyScroll;
window.enableBodyScroll = bodyScrollLock.enableBodyScroll;
window.targetElement = document.querySelector('#submitmodal');

window.Vue = require('vue');


import VueCountable from 'vue-countable';
Vue.component('vue-countable', VueCountable)

import Vuex from 'vuex';

Vue.use(Vuex)

import storeData from "./store/index";

import { ContentLoader } from 'vue-content-loader'

import autofocus from 'vue-autofocus-directive';
Vue.directive('autofocus', autofocus);

const store = new Vuex.Store(
    storeData
)
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/LikeButtons.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('like-button', require('./components/timeline/LikeButton.vue').default);
Vue.component('timeline', require('./components/timeline/Timeline.vue').default);
Vue.component('tweets', require('./components/timeline/Tweets.vue').default);
Vue.component('profile', require('./components/profile/Profile').default);
Vue.component('follow-alert', require('./components/profile/FollowAlert').default);
Vue.component('friends-list', require('./components/friends-list/FriendList').default);
Vue.component('replay', require('./components/timeline/Replay').default);
Vue.component('edit-modal', require('./components/timeline/editModal').default);
Vue.component('tweet-editor-model', require('./components/timeline/TweetEditorModel').default);
Vue.component('modal', require('./components/timeline/Modal').default);
Vue.component('tweet-with-replies', require('./components/timeline/TweetWithReplies').default);
Vue.component('publish-button', require('./components/publish-tweet-panal/button').default);
Vue.component('textarea-field', require('./components/publish-tweet-panal/textArea').default);
Vue.component('vue-countable', require('vue-countable').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const vuetifyOptions = {};

document.addEventListener('turbolinks:load', () => {
    const app = new Vue({
        el: '#app',
        store,  //vuex
    });
});
