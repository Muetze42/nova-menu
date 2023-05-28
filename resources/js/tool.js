import MenuSection from './components/MenuSection'
import MenuGroup from './components/MenuGroup'
import MenuItem from './components/MenuItem'
import MenuCard from './components/MenuCard'
import MainMenu from './components/MainMenu'
import NHMenuIcon from '@norman-huth/helpers-collection-js/components/nova/Icon.vue'
// import FormButton from './components/FormButton'
import UserMenu from './components/UserMenu'
// import DropdownMenuItem from './components/DropdownMenuItem'
import MenuDisclosure from './components/MenuDisclosure'

Nova.booting((app, store) => {
    app.component('NHMenuIcon', NHMenuIcon)
    app.component('menu-section-norman-huth', MenuSection)
    app.component('menu-group-norman-huth', MenuGroup)
    app.component('menu-item-norman-huth', MenuItem)
    app.component('menu-card-norman-huth', MenuCard)
    app.component('MainMenu', MainMenu)
    app.component('UserMenu', UserMenu)
    // app.component('FormButton', FormButton)
    // app.component('DropdownMenuItem', DropdownMenuItem)
    app.component('menu-disclosure', MenuDisclosure)
})
