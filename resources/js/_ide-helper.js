import Dropdown from './../../../../laravel/nova/resources/js/components/Dropdowns/Dropdown'
import DropdownTrigger from './../../../../laravel/nova/resources/js/components/Dropdowns/DropdownTrigger'
import DropdownMenu from './../../../../laravel/nova/resources/js/components/Dropdowns/DropdownMenu'
import DropdownMenuItem from './../../../../laravel/nova/resources/js/components/Dropdowns/DropdownMenuItem'
import FormButton from './../../../../laravel/nova/resources/js/components/FormButton'
import CollapseButton from './../../../../laravel/nova/resources/js/components/CollapseButton'
import Icon from './../../../../laravel/nova/resources/js/components/Icons/Icon.vue'
import NHMenuIcon from '@norman-huth/helpers-collection-js/components/nova/Icon.vue'

window.__ = function (key, replacements) {}

Vue.component('Dropdown', Dropdown)
Vue.component('DropdownTrigger', DropdownTrigger)
Vue.component('DropdownMenu', DropdownMenu)
Vue.component('DropdownMenuItem', DropdownMenuItem)
Vue.component('FormButton', FormButton)
Vue.component('CollapseButton', CollapseButton)
Vue.component('NHMenuIcon', NHMenuIcon)
Vue.component('Icon', Icon)
Vue.mixin({
  methods: {
    __(key, replacements) {
      return __(key, replacements)
    },
    logout() {},
    stopImpersonating() {}
  },
  data() {
    return {
      currentUser: {
        avatar: String,
        email: String,
        impersonating: Boolean
      }
    }
  }
})

class Nova {

}

window.appConfig = Object

window.Nova = new class {
  config(key) {
    return appConfig[key]
  }

  redirectToLogin() {
  }
}
