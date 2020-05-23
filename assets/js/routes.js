import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from './components/pages/Home';
import Login from './components/pages/Login';
import Logout from './components/pages/Logout';
import Userplant from "./components/pages/Userplant";
import Garden from "./components/pages/Garden";
import Profile from "./components/pages/Profile";
import Friends from "./components/pages/Friends";
import Plant from "./components/pages/Plant";

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes:[
        {path:'/', name:'home', component:Home},
        {path:'/login', name:'login', component:Login},
        {path:'/logout', name:'logout', component:Logout},
        {path:'/userplant/:id', name:'userplant', component:Userplant},
        {path:'/garden', name:'garden', component:Garden},
        {path: '/profile/:username', name:'profile', component:Profile},
        {path:'/friends', name:'friends', component:Friends},
        {path: '/plant/:linkname', name:'plantData', component:Plant}
    ]
});

export default router;