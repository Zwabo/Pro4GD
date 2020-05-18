import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from './components/pages/Home';
import Login from './components/pages/Login';
import Logout from './components/pages/Logout';
import Userplant from "./components/pages/Userplant";

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes:[
        {path:'/', name:'home', component:Home},
        {path:'/login', name:'login', component:Login},
        {path:'/logout', name:'logout', component:Logout},
        {path:'/userplant/:id', name:'userplant', component:Userplant}
    ]
});

export default router;