import MenuSection from './components/MenuSection'
import MenuGroup from './components/MenuGroup'

Nova.booting((app, store) => {
  app.component('menu-section-norman-huth', MenuSection)
  app.component('menu-group-norman-huth', MenuGroup)
})
