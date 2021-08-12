<div>
    <div><input type="text" wire:keydown.enter="search" wire:model.lazy="name" /> <span class="fa fa-spinner animate-spin" wire:loading wire:target="search"></span></div>
    <br>
    @foreach($users as $user)
    <div>- {{ $user->name }} ({{ $user->email }})</div>
    @endforeach
</div>