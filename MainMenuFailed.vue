<template>
    <div
        v-if="hasItems"
        class="sidebar-menu pb-24 space-y-6"
        dusk="sidebar-menu"
        role="navigation"
    >
        <div class="menu-filter menu-filter-top" v-if="$page.props.menuAdvPosition && ['top', 'both'].includes($page.props.menuAdvPosition)">
            <input type="search" v-model="menuFilter" class="w-full form-control form-input form-input-bordered menu-filter-input" :placeholder="$page.props.menuAdvPlaceholder ? $page.props.menuAdvPlaceholder : __('Filter')">
        </div>
        <component
            v-if="filteredMainMenu.length"
            :key="item.key"
            :is="item.component"
            v-for="(item, index) in this.filteredMainMenu"
            :item="item"
        />
        <div v-else class="text-center italic menu-filter-empty-text">
            {{ $page.props.menuAdvEmptyText ? $page.props.menuAdvEmptyText : __('No :resource matched the given criteria.', {resource: __('menu entry')}) }}
        </div>
        <div class="menu-filter menu-filter-top" v-if="$page.props.menuAdvPosition && ['bottom', 'both'].includes($page.props.menuAdvPosition)">
            <input type="search" v-model="menuFilter" class="w-full form-control form-input form-input-bordered menu-filter-input" :placeholder="$page.props.menuAdvPlaceholder ? $page.props.menuAdvPlaceholder : __('Filter')">
        </div>
    </div>
</template>

<script>
import {mapGetters} from 'vuex'

export default {
    name: 'MainMenu',
    data() {
        return {
            menuFilter: null,
            search: null,
            filteredMainMenu: null,
        }
    },
    methods: {
        filterItem(item, search) {
            if (item.name && item.name.toLowerCase().includes(search)) {
                return item
            }
            if (item.content && item.content.toLowerCase().includes(search)) {
                return item
            }

            if (item.items && item.items.length) {
                let items = []
                for (let child of item.items) {
                    let childItem = this.filterItem(child, search)
                    if (childItem) {
                        items.push(childItem)
                    }
                }
                if (items.length) {
                    item.items = items

                    return item
                }
            }

            return null
        }
    },
    watch: {
        menuFilter(newValue) {
            let search = newValue.toLowerCase().trim()

            if (!search.length) {
                this.filteredMainMenu = this.mainMenu
                return
            }

            let newMenu = [];

            for (const [key, value] of Object.entries(this.mainMenu)) {
                let item = this.filterItem(value, search)
                if (item) {
                    newMenu.push(value)
                }
            }
            this.filteredMainMenu = newMenu
        },
        mainMenu() {
            this.filteredMainMenu = this.mainMenu
        }
    },
    computed: {
        ...mapGetters(['mainMenu']),

        hasItems() {
            return this.mainMenu.length > 0
        },
    },
}
</script>
