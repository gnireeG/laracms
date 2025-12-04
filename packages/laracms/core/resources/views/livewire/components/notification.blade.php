<div class="fixed bottom-4 right-4 z-40 flex flex-col items-end" >
    <template x-for="(notification, index) in $store.notifications.notifications" :key="index">
        <div
            x-show="true"
            class="mb-2 max-w-sm bg-background-card pointer-events-auto overflow-hidden border border-r-border border-t-border border-b-border "
            :class="{
                'border-l-4 border-l-green-500': notification.type === 'success',
                'border-l-4 border-l-red-500': notification.type === 'error',
                'border-l-4 border-l-blue-500': notification.type === 'info',
            }"
        >
            <div class="p-2">
                <div class="flex items-start">
                    <div class="ml-2 flex gap-2 items-center">
                        <p class="text-sm" x-text="notification.message"></p>
                        <x-laracms::button @click="$store.notifications.removeNotification(notification.id)" size="sm" icon="x" variant="ghost" />
                    </div>
                </div>
            </div>
        </div>
    </template>
</div>
@script
<script>
    Alpine.store('notifications', {
        
        notifications: [
            /* {type: 'success', message: 'Welcome to Laracms!', id: Date.now()},
            {type: 'info', message: 'Welcome to Laracms! lorem ipsum dolor sit amet', id: Date.now()},
            {type: 'error', message: 'Welcome to Lara', id: Date.now()},
            {type: 'success', message: 'Welcome to Laracms! Test lorem', id: Date.now()}, */
        ],
        addNotification(message, type = 'info') {
            const id = Date.now()
            this.notifications.push({ message, type, id });
            setTimeout(() => {
                this.notifications = this.notifications.filter(notification => notification.id !== id);
            }, 5000);
        },
        removeNotification(id) {
            this.notifications = this.notifications.filter(notification => notification.id !== id);
        }
    });
</script>
@endscript