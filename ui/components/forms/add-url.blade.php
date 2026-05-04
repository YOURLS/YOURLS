@props(['url' => '', 'keyword' => ''])
{{-- Preserves legacy DOM hooks (#new_url, #new_url_form, #add-url,
     #add-keyword, #add-button, #feedback) so plugins that target them
     keep working. --}}
<main role="main">
    <div id="new_url" class="yourls-card mb-6 p-4 sm:p-5">
        <form id="new_url_form" action="" method="get" class="grid grid-cols-1 gap-3 sm:grid-cols-[1fr_auto_auto] sm:items-end">
            <x-molecules::form-field :label="function_exists('yourls__') ? yourls__('Enter the URL') : 'Enter the URL'" for="add-url" required>
                <x-atoms::input
                    id="add-url"
                    name="url"
                    type="url"
                    :value="$url"
                    placeholder="https://"
                    required
                />
            </x-molecules::form-field>
            <x-molecules::form-field :label="(function_exists('yourls__') ? yourls__('Optional') : 'Optional') . ': ' . (function_exists('yourls__') ? yourls__('Custom short URL') : 'Custom short URL')" for="add-keyword">
                <x-atoms::input
                    id="add-keyword"
                    name="keyword"
                    :value="$keyword"
                    size="md"
                />
            </x-molecules::form-field>
            <div>
                @yourlsNonce('add_url', 'nonce-add')
                <x-atoms::button
                    type="button"
                    id="add-button"
                    name="add-button"
                    variant="primary"
                    icon="plus"
                    onclick="add_link();"
                >@yourlsT('Shorten The URL')</x-atoms::button>
            </div>
        </form>
        <div id="feedback" class="mt-3" style="display:none"></div>
        @yourlsAction('html_addnew')
    </div>
</main>
