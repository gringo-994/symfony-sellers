import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

const Sellers = () => import('../views/sellers/Sellers')

export default new Router({
  routes: [
    {
      path: '/',
      redirect: {name: 'sellers'}
    },
    {
      path: '/sellers',
      name: 'sellers',
      component: Sellers
    }
  ]
})
