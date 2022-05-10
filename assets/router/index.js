import HomeComponent from "../components/HomeComponent";
import CategoryComponent from "../components/CategoryComponent";

export default [
    {
        path: '/', component: HomeComponent
    },
    {
        path: '/category/:id', component: CategoryComponent
    },
];