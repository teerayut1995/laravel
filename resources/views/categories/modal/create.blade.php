 <!-- Modal -->
<div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="modalCreate" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-6 shadow">
          <div class="modal-header border-bottom-0">
            <h5 class="modal-title font-title text-primary">เพิ่มประเภทบทความ</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body py-0">
            <form class="row g-3" method="post" action="{{url('/categories')}}">
                @csrf
                <div class="col-12">
                  <label class="form-label">ชื่อ (ภาษาไทย)</label>
                  <input type="text" name="category_name_th" class="form-control" required>
                </div>
                <div class="col-12">
                  <label class="form-label">ชื่อ (ภาษาอังกฤษ)</label>
                  <input type="text" name="category_name_en" class="form-control" required>
                </div>
                <div class="col-12">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="category_status" checked>
                        <label class="form-check-label" for="flexSwitchCheckChecked">สถานะ</label>
                      </div>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <button type="button" class="btn btn-light d-block" data-bs-dismiss="modal">ปิด</button>
                    <button type="submit" class="btn btn-primary d-block">บันทึกข้อมูล <i class="bi bi-plus ms-1"></i></button>
                </div>
              </form>
          </div>
        </div>
      </div>
  </div>