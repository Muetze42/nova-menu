import Dropdown from './../../../../vendor/laravel/nova/resources/js/components/Dropdowns/Dropdown'
import DropdownTrigger from './../../../../vendor/laravel/nova/resources/js/components/Dropdowns/DropdownTrigger'
import DropdownMenu from './../../../../vendor/laravel/nova/resources/js/components/Dropdowns/DropdownMenu'
import DropdownMenuItem from './../../../../vendor/laravel/nova/resources/js/components/Dropdowns/DropdownMenuItem'
import FormButton from './../../../../vendor/laravel/nova/resources/js/components/FormButton'

Vue.component('Dropdown', Dropdown)
Vue.component('DropdownTrigger', DropdownTrigger)
Vue.component('DropdownMenu', DropdownMenu)
Vue.component('DropdownMenuItem', DropdownMenuItem)
Vue.component('FormButton', FormButton)
Vue.mixin({
    methods: {
        __(key, replacements) {
            return __(key, replacements);
        },
    }
})
