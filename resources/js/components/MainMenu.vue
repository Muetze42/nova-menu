<script setup>
import { computed, ref, onMounted, watch } from 'vue'
import { useStore } from 'vuex'
import { Inertia } from '@inertiajs/inertia'

defineOptions({
  name: 'MainMenu',
})

const store = useStore()
const menuFilter = ref('')
const showItems = ref(true)

const menuAdvPosition = computed(() => Nova.config('menuAdvPosition'))
const unfilteredMainMenuOver = computed(() => Nova.config('unfilteredMainMenuOver'))
const unfilteredMainMenuUnder = computed(() => Nova.config('unfilteredMainMenuUnder'))

const mainMenu = computed(() => store.getters.mainMenu)
// const hasItems = computed(() => mainMenu.value.length > 0)
const hasItems = computed(() => {
  return mainMenu.value.length > 0
    || (unfilteredMainMenuOver.value && unfilteredMainMenuOver.value.length > 0)
    || (unfilteredMainMenuUnder.value && unfilteredMainMenuUnder.value.length > 0)
})

onMounted(() => {
  Inertia.on('before', (event) => {
    if (menuFilter.value) {
      filterMenu(menuFilter.value)
    }
  })
  Inertia.on('navigate', (event) => {
    if (menuFilter.value) {
      filterMenu(menuFilter.value)
    }
  })
})

watch(menuFilter, (newValue) => {
  filterMenu(newValue)
})

function filterMenu(search = null) {
  showItems.value = false
  search = search.toLowerCase().trim()

  mainMenu.value.forEach(item => {
    filterItem(item, search)
  })
}

function filterItem(item, search, show = false) {
  /* Skip not filterable items */
  if (item.notFilterable || item.classes === undefined || item.classes.filterClass === undefined || !item.filterClass === undefined) {
    showItems.value = true
    console.log('# Skip', item)
    return true
  }

  let hide = search.length
  if (hide && item.name && item.name.toLowerCase().includes(search)) {
    hide = false
    show = true
  }
  if (hide && item.content && item.content.toLowerCase().includes(search)) {
    hide = false
    show = true
  }
  if (hide && item.keywords && item.keywords.join().toLowerCase().includes(search)) {
    hide = false
    show = true
  }

  if (item.items && item.items.length) {
    item.items.forEach(childItem => {
      if (!filterItem(childItem, search, show)) {
        hide = false
      }
    })
  }

  if (!show && hide) {
    item.classes.filterClass = item.filterClass
  }
  if (!hide || show) {
    showItems.value = true
    item.classes.filterClass = ''
  }

  return hide
}
</script>
<template>
  <div
    v-if="hasItems"
    class="sidebar-menu space-y-6"
    dusk="sidebar-menu"
    role="navigation"
  >
    <component
      v-if="unfilteredMainMenuOver && unfilteredMainMenuOver.length > 0"
      :key="item.key"
      :is="item.component"
      v-for="(item, index) in unfilteredMainMenuOver"
      :item="item"
    />

    <div class="menu-filter menu-filter-top" v-if="menuAdvPosition && ['top', 'both'].includes(menuAdvPosition)">
      <input type="search" v-model="menuFilter"
             class="w-full form-control form-input form-input-bordered menu-filter-input form-control-bordered"
             :placeholder="$page.props.menuAdvPlaceholder ? $page.props.menuAdvPlaceholder : __('Filter')">
    </div>

    <div v-if="!showItems" class="text-center italic menu-filter-empty-text">
      {{
        $page.props.menuAdvEmptyText ? $page.props.menuAdvEmptyText :
          __('No :resource matched the given criteria.', {resource: __('menu entry')})
      }}
    </div>

    <component
      :key="item.key"
      :is="item.component"
      v-for="(item, index) in mainMenu"
      :item="item"
    />

    <div class="menu-filter menu-filter-bottom"
         v-if="menuAdvPosition && ['bottom', 'both'].includes(menuAdvPosition)">
      <input type="search" v-model="menuFilter"
             class="w-full form-control form-input form-input-bordered menu-filter-input form-control-bordered"
             :placeholder="$page.props.menuAdvPlaceholder ? $page.props.menuAdvPlaceholder : __('Filter')">
    </div>

    <component
      v-if="unfilteredMainMenuUnder && unfilteredMainMenuUnder.length > 0"
      :key="item.key"
      :is="item.component"
      v-for="(item, index) in unfilteredMainMenuUnder"
      :item="item"
    />

  </div>
</template>
