 <!-- Modal -->
 <div class="modal fade" id="modalDelete{{ $category->id }}" tabindex="-1" aria-labelledby="modalDelete{{ $category->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-body p-4 text-center">
              <h5 class="mb-1">ยืนยันการลบข้อมูล</h5>
              <p class="mb-0">ต้องการลบข้อมูล <span class="text-danger">{{ $category->category_name_th }}</span> ใช่หรือไม่ ?</p>
            </div>
            <div class="modal-footer flex-nowrap p-0">
                <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 text-muted" data-bs-dismiss="modal">ไม่ต้องการ</button>
                <form method="post" class="col-6 m-0" action="{{url('/categories', $category->id)}}">
                    @csrf
                    @method('DELETE')
                <button type="submit" class="btn btn-lg btn-link w-100 fs-6 text-decoration-none rounded-0 text-danger border-left"><strong>ใช่ ลบข้อมูล</strong></button>
                </form>
            </div>
          </div>
      </div>
  </div>