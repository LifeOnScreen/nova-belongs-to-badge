Nova.booting((Vue, router) => {
    Vue.component('index-belongs-to-badge', require('./components/IndexField'));
    Vue.component('detail-belongs-to-badge', require('./components/DetailField'));
})
