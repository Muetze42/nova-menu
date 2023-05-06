<template>
    <div
        v-if="hasItems"
        class="sidebar-menu pb-24 space-y-6"
        dusk="sidebar-menu"
        role="navigation"
    >
        <div class="menu-filter menu-filter-top" v-if="$page.props.menuAdvPosition && ['top', 'both'].includes($page.props.menuAdvPosition)">
            <input type="search" v-model="menuFilter" class="w-full form-control form-input form-input-bordered menu-filter-input"
                   :placeholder="$page.props.menuAdvPlaceholder ? $page.props.menuAdvPlaceholder : __('Filter')">
        </div>
        <component
            :key="item.key"
            :is="item.component"
            v-for="(item, index) in mainMenu"
            :item="item"
        />
        <div class="menu-filter menu-filter-bottom" v-if="$page.props.menuAdvPosition && ['top', 'both'].includes($page.props.menuAdvPosition)">
            <input type="search" v-model="menuFilter" class="w-full form-control form-input form-input-bordered menu-filter-input"
                   :placeholder="$page.props.menuAdvPlaceholder ? $page.props.menuAdvPlaceholder : __('Filter')">
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
            hiddenClass: ' hidden',
        }
    },

    methods: {
        filterItem(item, search, parentId) {
            return search.length
        }
    },

    watch: {
        menuFilter(newValue) {
            let search = newValue.toLowerCase().trim()

            // console.log(this.mainMenu)
            this.mainMenu.forEach((item, index) => {
                let hide = this.filterItem(item, search, index)

                console.log(hide)

                if (hide && !this.mainMenu[index].classes.includes(this.hiddenClass)) {
                    this.mainMenu[index].classes = this.mainMenu[index].classes + this.hiddenClass
                }
                if (!hide) {
                    this.mainMenu[index].classes = this.mainMenu[index].classes.replace(this.hiddenClass, '')
                }
            })
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
