import VueRouter from 'vue-router';

let routes = [
    {
        name: 'home',
        path: '',
        component: require('./views/index'),
    },

    {
        path: '/posts',
        component: require('./views/posts/index'),
        children: [
            {
                name: 'posts',
                path: '',
                component: require('./views/posts/create')
            },
            {
                name: 'posts/edit',
                path: ':id/edit',
                component: require('./views/posts/edit')
            }
        ]
    }
];

export default new VueRouter({
    routes: routes,
    //mode: 'history',
    linkActiveClass: 'is-active'
});