<div class="modal fade" id="cancelOrderModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form id="cancelOrderForm" method="POST" action="" class="modal-content cancel-modal">
            @csrf

            <div class="modal-body text-center pb-2">
                <div class="cancel-modal-icon"><i class="fas fa-exclamation-triangle"></i></div>
                <h5 class="mt-3 mb-1 font-weight-bold">Cancel this order?</h5>
                <p class="text-muted small mb-3">This action cannot be undone.</p>

                <div class="cancel-modal-summary text-left mb-3">
                    <div><small class="text-muted">Album</small><strong id="cancelAlbum">-</strong></div>
                    <div><small class="text-muted">Total</small><strong id="cancelTotal">-</strong></div>
                </div>

                <div id="cancelRefundNote" class="cancel-modal-refund text-left mb-3" style="display: none;">
                    <i class="fas fa-undo mr-1"></i>
                    You have uploaded a payment proof, so your payment will be refunded.
                </div>

                <div class="text-left">
                    @include('pages.partials.cancel-reason', [
                    'reasons' => \App\Models\Order::BUYER_CANCEL_REASONS,
                    'required' => true,
                    ])
                </div>
            </div>

            <div class="modal-footer border-0 pt-0 justify-content-center">
                <button type="button" class="btn btn-secondary px-4" data-dismiss="modal">Keep Order</button>
                <button type="submit" class="btn btn-danger px-4">Yes, Cancel Order</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        $('#cancelOrderModal').on('show.bs.modal', function(e) {
            const btn = $(e.relatedTarget);
            const form = document.getElementById('cancelOrderForm');

            form.action = btn.data('action');
            document.getElementById('cancelAlbum').innerText = btn.data('album');
            document.getElementById('cancelTotal').innerText = btn.data('total');
            document.getElementById('cancelRefundNote').style.display = btn.data('paid') == 1 ? '' : 'none';

            // reset pilihan setiap modal dibuka
            const select = form.querySelector('.cancel-reason-select');
            select.value = '';
            select.dispatchEvent(new Event('change'));
            form.querySelector('.cancel-reason-other').value = '';
        });
    });
</script>