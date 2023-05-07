<template>
    <div
        v-if="hasItems"
        className="sidebar-menu pb-24 space-y-6"
        dusk="sidebar-menu"
        role="navigation"
    >
        <div className="menu-filter menu-filter-top" v-if="$page.props.menuAdvPosition && ['top', 'both'].includes($page.props.menuAdvPosition)">
            <input type="search" v-model="menuFilter" className="w-full form-control form-input form-input-bordered menu-filter-input"
                   :placeholder="$page.props.menuAdvPlaceholder ? $page.props.menuAdvPlaceholder : __('Filter')">
        </div>
        <div v-if="!showItems" className="text-center italic menu-filter-empty-text">
            {{
                $page.props.menuAdvEmptyText ? $page.props.menuAdvEmptyText : __('No :resource matched the given criteria.', {resource: __('menu entry')})
            }}
        </div>
        <component
            :key="item.key"
            :is="item.component"
            v-for="(item, index) in mainMenu"
            :item="item"
        />
        <div className="menu-filter menu-filter-bottom" v-if="$page.props.menuAdvPosition && ['top', 'both'].includes($page.props.menuAdvPosition)">
            <input type="search" v-model="menuFilter" className="w-full form-control form-input form-input-bordered menu-filter-input"
                   :placeholder="$page.props.menuAdvPlaceholder ? $page.props.menuAdvPlaceholder : __('Filter')">
        </div>
    </div>
</template>

<script>
import {mapGetters} from 'vuex'
import {Inertia} from '@inertiajs/inertia';

export default {
    name: 'MainMenu',

    data() {
        return {
            menuFilter: null,
            hiddenClass: ' hidden',
            showItems: true,
        }
    },

    computed: {
        ...mapGetters(['mainMenu']),

        hasItems() {
            return this.mainMenu.length > 0
        },
    },

    mounted() {
        Inertia.on('before', (event) => {
            if (this.menuFilter) {
                this.filterMenu(this.menuFilter)
            }
        });
    },

    watch: {
        menuFilter(newValue) {
            this.filterMenu(newValue)
        }
    },

    methods: {
        filterMenu(search = null) {
            this.showItems = false
            search = search.toLowerCase().trim()

            this.mainMenu.forEach(item => {
                this.filterItem(item, search)
            })
        },
        filterItem(item, search, show = false) {
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
                    if (!this.filterItem(childItem, search, show)) {
                        hide = false
                    }
                })
            }

            if (!show && hide) {
                item.classes.filterClass = item.filterClass
            }
            if (!hide || show) {
                this.showItems = true
                item.classes.filterClass = ''
            }

            return hide
        },
    },
}
</script>
