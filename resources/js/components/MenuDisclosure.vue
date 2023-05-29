<template>
    <Disclosure v-slot="{ open }" as="div" class="form-input-bordered menu-disclosure rounded" :class="item.classes.elem">
        <DisclosureButton
            :class="item.classes.label"
            class="flex flex-wrap justify-between items-center hover:bg-gray-50 dark:hover:bg-gray-800 block w-full text-left cursor-pointer py-2 px-3 focus:outline-none focus:ring rounded truncate whitespace-nowrap text-gray-500 active:text-gray-600 dark:text-gray-500 dark:hover:text-gray-400 dark:active:text-gray-600" v-on:click.stop
        >
            <div>
                <NHMenuIcon :icons="item.icons" />
                {{ item.name }}
            </div>
            <CollapseButton
                class=""
                :collapsed="!open"
            />
        </DisclosureButton>
        <DisclosurePanel class="text-gray-500">
            <component
                :is="childItem.component"
                v-for="childItem in formattedItems"
                :key="childItem.path"
                v-bind="childItem.props"
                v-on="childItem.on"
            >
                <span v-if="childItem.badge" class="mr-1">
                    <Badge :extra-classes="childItem.badge.typeClass">
                        {{ childItem.badge.value }}
                    </Badge>
                </span>

                {{ childItem.name }}
            </component>
        </DisclosurePanel>
    </Disclosure>
</template>

<script>
import {
    Disclosure,
    DisclosureButton,
    DisclosurePanel,
} from '@headlessui/vue'

import pickBy from "lodash/pickBy";
import omitBy from "lodash/omitBy";
import isNull from "lodash/isNull";
import identity from "lodash/identity";

export default {
    name: "MenuDisclosure",
    props: ['item'],
    components: {
        Disclosure,
        DisclosureButton,
        DisclosurePanel,
    },
    computed: {
        formattedItems() {
            return this.item.items.map(i => {
                let menuComponents = [
                    'menu-section-norman-huth',
                    'menu-group-norman-huth',
                    'menu-item-norman-huth',
                    'menu-card-norman-huth',
                    'menu-section',
                    'menu-group',
                    'menu-item',
                    'menu-card',
                ];
                if (!menuComponents.includes(i.component) || i.isCustom) {
                    return {
                        component: i.component,
                        isCustom: true,
                        props: {item: i},
                        on: {},
                    }
                }

                let method = i.method || 'GET'
                let props = { href: i.path }

                if (i.external && method == 'GET') {
                    return {
                        component: 'DropdownMenuItem',
                        props: {
                            ...props,
                            target: i.target || null,
                        },
                        name: i.name,
                        external: i.external,
                        on: {},
                    }
                }

                return {
                    component: 'DropdownMenuItem',
                    props: pickBy(
                        omitBy(
                            {
                                ...props,
                                method: method !== 'GET' ? method : null,
                                data: i.data || null,
                                headers: i.headers || null,
                                as: method === 'GET' ? 'link' : 'form-button',
                            },
                            isNull
                        ),
                        identity
                    ),
                    external: i.external,
                    name: i.name,
                    on: {},
                    badge: i.badge,
                }
            })
        },
    },
}
</script>
