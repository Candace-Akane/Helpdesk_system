<div id="ticketModal" class="modal fade">
	<div class="modal-dialog modal-lg" style="max-width: 600px;">
		<form method="post" id="ticketForm">
			<div class="modal-content" style="border-radius: 16px; overflow: hidden; box-shadow: 0 10px 35px rgba(0,0,0,0.2); border: none;">
				<div class="modal-header" style="background: linear-gradient(135deg, #0B3D2E, #145A32); color: #fff; border: none;">
					<h4 class="modal-title" style="font-weight: 600; letter-spacing: 0.5px;">
						<i class="fa fa-plus"></i> Add New Ticket
					</h4>
					<button type="button" class="close" data-dismiss="modal" style="color: #fff; opacity: 0.8; font-size: 28px;">&times;</button>
				</div>
				<div class="modal-body" style="background-color: #f9fafb; padding: 25px 30px;">
					<div class="form-group">
						<label for="subject" class="control-label field-label">Subject</label>
						<input type="text" class="form-control styled-input" id="subject" name="subject" placeholder="Enter ticket subject" required>
					</div>
					<div class="form-group">
						<label for="department" class="control-label field-label">Department</label>
						<select id="department" name="department" class="form-control styled-input" required>
							<?php $tickets->getDepartments(); ?>
						</select>
					</div>
					<div class="form-group">
						<label for="message" class="control-label field-label">Message</label>
						<textarea class="form-control styled-input" rows="5" id="message" name="message" placeholder="Describe your issue..." required></textarea>
					</div>
					<div class="form-group">
						<label for="status" class="control-label field-label">Status</label><br>
						<label class="radio-inline" style="color: #333; margin-right: 15px;">
							<input type="radio" name="status" id="open" value="0" checked required> Open
						</label>
						<?php if (isset($_SESSION["admin"])) { ?>
							<label class="radio-inline" style="color: #333;">
								<input type="radio" name="status" id="close" value="1" required> Close
							</label>
						<?php } ?>
					</div>
				</div>
				<div class="modal-footer" style="background-color: #f1f3f2; border-top: 1px solid #e0e0e0; padding: 15px 25px;">
					<input type="hidden" name="ticketId" id="ticketId" />
					<input type="hidden" name="action" id="action" value="" />
					<button type="submit" name="save" id="save" class="btn btn-success modern-btn" style="background-color: #145A32;">Save Ticket</button>
					<button type="button" class="btn btn-light modern-btn" data-dismiss="modal" style="background-color: #e0e0e0; color: #333;">Cancel</button>
				</div>
			</div>
		</form>
	</div>
</div>

<style>
	.modal-dialog {
		position: relative;
		margin: auto;
		top: 50%;
		transform: translateY(-50%);
		max-width: 600px;
		width: 90%;
	}
	.modal.fade .modal-dialog {
		transform: translateY(-40%);
		transition: all 0.4s ease-out;
	}
	.modal.in .modal-dialog {
		transform: translateY(-50%);
	}
	.modal-content {
		border-radius: 12px !important;
		border: none !important;
		overflow: hidden !important;
		box-shadow: 0 10px 35px rgba(0, 0, 0, 0.25);
		background-color: #fff;
	}
	.modal-header {
		display: flex;
		align-items: center;
		justify-content: space-between;
		padding: 15px 20px;
		background: linear-gradient(135deg, #0B3D2E, #145A32);
		color: #fff;
		border-bottom: none;
		border-top-left-radius: 12px;
		border-top-right-radius: 12px;
	}
	.modal-header .close {
		margin: 0;
		padding: 0;
		font-size: 26px;
		font-weight: 400;
		line-height: 1;
		color: #fff;
		opacity: 0.9;
		cursor: pointer;
		transition: 0.2s ease;
	}
	.modal-header .close:hover {
		opacity: 1;
		transform: scale(1.1);
	}
	.modal-body {
		background-color: #f9fafb;
		padding: 25px 30px;
		margin: 0;
		border: none;
	}
	.field-label {
		font-weight: 600;
		color: #0B3D2E;
		margin-bottom: 6px;
		display: inline-block;
		font-size: 14px;
	}
	.styled-input {
		border-radius: 8px;
		border: 1px solid #bdbdbd;
		padding: 7px 12px;
		width: 100%;
		background-color: #fff;
		font-size: 14px;
		color: #333;
		transition: all 0.25s ease-in-out;
	}
	.styled-input:hover {
		border-color: #999;
	}
	.styled-input:focus {
		border-color: #28a745;
		box-shadow: 0 0 8px rgba(40, 167, 69, 0.3);
		outline: none;
	}
	textarea.styled-input {
		min-height: 100px;
		resize: vertical;
	}
	.modal-footer {
		background-color: #f1f3f2;
		border-top: 1px solid #e0e0e0;
		padding: 15px 25px;
		margin: 0;
		border-bottom-left-radius: 12px;
		border-bottom-right-radius: 12px;
		display: flex;
		justify-content: flex-end;
		gap: 10px;
	}
	.modern-btn {
		border-radius: 8px;
		padding: 9px 20px;
		font-weight: 500;
		border: none;
		font-size: 14px;
		transition: all 0.25s ease;
	}
	.btn-success.modern-btn {
		background-color: #145A32;
		color: #fff;
	}
	.btn-success.modern-btn:hover {
		background-color: #0e4628 !important;
		box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);
		transform: translateY(-1px);
	}
	.btn-light.modern-btn {
		background-color: #e0e0e0;
		color: #333;
	}
	.btn-light.modern-btn:hover {
		background-color: #cfcfcf !important;
		color: #000;
		box-shadow: 0 3px 8px rgba(0, 0, 0, 0.15);
		transform: translateY(-1px);
	}
	.modal-backdrop.in {
		opacity: 0.45;
	}
	body.modal-open {
		overflow: hidden;
	}
</style>
