<script setup lang="ts">
import { ref } from 'vue';
import AppLayout from '../layouts/AppLayout.vue';
import CreateClientNetwork from './admin/clientnetworks/CreateClientNetwork.vue';
import ShowClientNetworks from './admin/clientnetworks/ShowClientNetworks.vue';

const showNetworksRef = ref<InstanceType<typeof ShowClientNetworks> | null>(null);

function handleNetworkSaved() {
  if (showNetworksRef.value) {
    showNetworksRef.value.loadNetworks();
  }
}
</script>

<template>
  <AppLayout>
    <div class="w-full">
      <CreateClientNetwork @saved="handleNetworkSaved" />
    </div>

    <div class="w-full mt-5">
      <ShowClientNetworks ref="showNetworksRef" />
    </div>
  </AppLayout>
</template>
