<template>
  <div class="flex flex-wrap">
    <div class="w-full">
        <div class="tabs" >
            <ul class="flex mb-0 list-none flex-wrap pt-3 pb-4 flex-row">
                <li class="-mb-px mr-2 last:mr-0 flex-auto text-center"
                  v-for="tab in tabs" :class="{ 'is-active': tab.isActive }">
                  <div v-if="tab.isActive" >
                    <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-blue-600 bg-white w-full zoom-in"
                         :href="tab.href" @click="selectTab(tab)">
                         <i :class="tab.icon" class="fas text-base mr-1" ></i>
                          {{ tab.name }}
                    </a>
                  </div>
                  <div v-else >
                      <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-white bg-blue-600 w-full zoom-in"
                            :href="tab.href" @click="selectTab(tab)">
                            <i :class="tab.icon" class="fas text-base mr-1" ></i>
                            {{ tab.name }}
                        </a>
                  </div>
                </li>
            </ul>
        </div>
        <!-- <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded"> old layout -->
      <div class="rounded shadow">
        <div class="px-4 py-5 flex-auto">
          <div class="tab-content tab-space">
            <div class="tabs-details">
                <slot></slot>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    name: "tabs",
    data() {
        return {
            tabs: []
        }
    },
    created() {

    },
    methods: {
        selectTab(selectedTab) {
            this.tabs.forEach(tab => {
                tab.isActive = (tab.name == selectedTab.name);
            });
        }
    }
}
</script>
