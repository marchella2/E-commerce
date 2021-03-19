<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Checkout</div>

                <div class="card-body">
                    @if ($formCheckout)
                        <form wire:submit.prevent="checkout">
                            <div class="form-group">
                                <div class="form-row mb-2">
                                    <div class="col">
                                        <input wire:model="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" placeholder="Nama Depan">
                                        @error('first_name')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col">
                                        <input wire:model="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" placeholder="Nama Belakang">
                                        @error('last_name')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row mb-2">
                                    <div class="col">
                                        <input wire:model="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                                        @error('email')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col">
                                        <input wire:model="phone" type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="No. HP">
                                          @error('phone')
                                              <span class="invalid-feedback">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                    </div>
                                </div>

                                <div class="form-row mb-2">
                                    <div class="col">
                                        <textarea wire:model="address" id="" cols="30" rows="5" class="form-control @error('address') is-invalid @enderror" placeholder="Alamat"></textarea>
                                        @error('address')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row mb-2">
                                    <div class="col">
                                        <input wire:model="city" type="text" class="form-control @error('city') is-invalid @enderror" placeholder="Kota">
                                        @error('city')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col">
                                        <input wire:model="postal_code" type="text" class="form-control @error('postal_code') is-invalid @enderror" placeholder="Kode Pos">
                                        @error('postal_code')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                <a href="{{ route('shop.cart') }}" class="btn btn-sm btn-danger">Back</a>
                            </div>
                        </form>
                    @else
                        <button wire:click="$emit('payment', '{{ $snapToken }}')" class="btn btn-primary">Payment</button>
                        <script>
                            window.livewire.on('payment', function (snapToken) {
                                snap.pay(snapToken, {
                                    // Optional
                                    onSuccess: function (result) {
                                        window.livewire.emit('emptyCart');
                                        window.location.href = "/shop";
                                    },
                                    // Optional
                                    onPending: function (result) {
                                        window.livewire.emit('emptyCart');
                                        window.location.href = "/shop";
                                    },
                                    // Optional
                                    onError: function (result) {
                                        location.reload();
                                    }
                                });
                            });
                        </script>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>