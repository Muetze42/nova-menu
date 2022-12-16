import MenuSection from './components/MenuSection'
import MenuGroup from './components/MenuGroup'
import MenuItem from './components/MenuItem'

Nova.booting((app, store) => {
  app.component('menu-section-norman-huth', MenuSection)
  app.component('menu-group-norman-huth', MenuGroup)
  app.component('menu-item-norman-huth', MenuItem)
})
