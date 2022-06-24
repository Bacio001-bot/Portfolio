<div x-data="{ open: false }">
    <div class="py-5 w-full">
        <div class="flex flex-auto">

            <input wire:model="search" type="email" name="email" id="email" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block  sm:text-sm border-gray-300 rounded-md w-[20rem]" placeholder="you@example.com">
            <div class=" relative w-[10rem] ml-5">
                <button @click="open = ! open" type="button"
                    class="bg-white relative w-full border border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label">
                    <span class="block truncate"> {{$category}} </span>
                    <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth={2}>
                            <path strokeLinecap="round" strokeLinejoin="round" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                          </svg>
                          <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                          </svg>
                    </span>
                </button>
                <div x-cloak x-show="open" @click.outside="open = false">
                    <ul class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-60 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm"
                        tabindex="-1" role="listbox" aria-labelledby="listbox-label"
                        aria-activedescendant="listbox-option-3">

                        <li wire:click="sortCategory('name')"
                            class="hover:bg-gray-100 cursor-pointer text-gray-900 select-none relative py-2 pl-3 pr-9"
                            id="listbox-option-0" role="option">
                            <span class="font-normal block truncate"> Name </span>
                        </li>
                        <li wire:click="sortCategory('logo')"
                            class="hover:bg-gray-100 cursor-pointer text-gray-900 select-none relative py-2 pl-3 pr-9"
                            id="listbox-option-0" role="option">
                            <span class="font-normal block truncate"> Logo </span>
                        </li>
                        <li wire:click="sortCategory('website')"
                            class="hover:bg-gray-100 cursor-pointer text-gray-900 select-none relative py-2 pl-3 pr-9"
                            id="listbox-option-0" role="option">
                            <span class="font-normal block truncate"> Website </span>
                        </li>
                        <li wire:click="sortCategory('email')"
                            class="hover:bg-gray-100 cursor-pointer text-gray-900 select-none relative py-2 pl-3 pr-9"
                            id="listbox-option-0" role="option">
                            <span class="font-normal block truncate"> Email </span>
                        </li>
                    </ul>
                </div>

            </div>
            <a href="{{route('company.create')}}">
                <button type="button" class=" right-0 absolute py-2 inline-flex items-center px-6 border border-transparent font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 gap-x-5">Create</button>
            </a>

        </div>
    </div>
    <div class="overflow-x-auto shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
        <table class="min-w-full divide-y divide-gray-300">
            <thead class="bg-gray-50">
                <tr>
                    <th wire:click="sortBy('name')" scope="col" class="cursor-pointer py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
                    <th wire:click="sortBy('logo')" scope="col" class="cursor-pointer px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Logo</th>
                    <th wire:click="sortBy('website')" scope="col" class="cursor-pointer px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Website</th>
                    <th wire:click="sortBy('email')" scope="col" class="cursor-pointer px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Email</th>
                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">

                @foreach ($companies as $company)
                <tr x-data="{ menu:false }">
                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                        {{$company->name}}</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$company->logo}}</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$company->website}}</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$company->email}}                         
                        <ul x-cloak x-show="menu" x-on:click.outside="menu = false"  class="w-[10rem] right-10 cursor-pointer text-center absolute px-2 bg-white border rounded-lg">
                            <li class="py-1 border-b" onclick="return confirm('Are you sure?') ? @this.delete({{$company->id}}) : false" >Delete</li>
                            <a href="{{route('company.edit', ['company' => $company])}}">
                                <li class="py-1 border-b">Edit</li>
                            </a>
                        </ul>
                    </td>
                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                        <h1 x-on:click=" menu = ! menu" class="text-indigo-600 hover:text-indigo-900"><i class="fa-solid fa-ellipsis-vertical"></i></h1>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <div class="p-3">
        {{$companies->links()}}
    </div>
</div>