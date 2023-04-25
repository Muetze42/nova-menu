import MenuSection from './components/MenuSection'
import MenuGroup from './components/MenuGroup'
import MenuItem from './components/MenuItem'
import MenuCard from './components/MenuCard'
import Icon from './components/Icon'

Nova.booting((app, store) => {
    app.component('NHMenuIcon', Icon)
    app.component('menu-section-norman-huth', MenuSection)
    app.component('menu-group-norman-huth', MenuGroup)
    app.component('menu-item-norman-huth', MenuItem)
    app.component('menu-card-norman-huth', MenuCard)
})
