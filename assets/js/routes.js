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
import News from "./components/pages/News";
import Article from "./components/pages/Article";
import Contact from "./components/pages/Contact";
import AGB from "./components/pages/AGB";
import Imprint from "./components/pages/Imprint";
import Tipps from "./components/pages/Tipps";
import TippArticle from "./components/pages/TippArticle";
import Register from "./components/pages/Register";
import Database from "./components/pages/Database";
import AddPlant from "./components/pages/AddPlant";
import Settings from "./components/pages/Settings";

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes:[
        {path:'/', name:'home', component:Home},
        {path:'/login', name:'login', component:Login},
        {path:'/register', name:'register', component:Register},
        {path:'/logout', name:'logout', component:Logout},
        {path:'/userplant/:id', name:'userplant', component:Userplant},
        {path:'/garden/:id', name:'garden', component:Garden},
        {path:'/garden', name:'data', component:Garden},
        {path: '/profile/:username', name:'profile', component:Profile},
        {path:'/friends', name:'friends', component:Friends},
        {path: '/plant/:linkname', name:'plantData', component:Plant},
        {path: '/news', name:'news', component:News},
        {path: '/news/:id', name:'article', component:Article},
        {path: '/contact', name:'contact', component:Contact},
        {path: '/imprint', name:'imprint', component:Imprint},
        {path: '/agb', name:'agb', component:AGB},
        {path: '/tipps', name:'tipps', component:Tipps},
        {path: '/tipps/:id', name:'tippArticle', component:TippArticle},
        {path: '/database', name:'getPlants', component:Database},
        {path: '/addPlant', name:'addPlants', component:AddPlant},
        {path: '/settings/', name:'settings', component:Settings}
    ]
});

export default router;