@extends('layouts.website.master')

@section('title', 'Edit Business Card - Professional Printing Service')
<style>
    /* Smooth scrolling for better UX */
    html {
        scroll-behavior: smooth;
    }

    /* Adjust form layout for sticky preview */
    .col-lg-6:first-child {
        padding-right: var(--text-20);
    }

    .col-lg-6:last-child {
        padding-left: var(--text-20);
    }

    /* Modern Beautiful Styling - Matching Website Theme */
    .contact-form-container {
        background: white;
        border-radius: var(--text-20);
        padding: var(--text-40);
        box-shadow: 0 var(--text-20) var(--text-60) rgba(8, 30, 55, 0.08);
        transition: all 0.3s ease;
    }

    .contact-form-container:hover {
        box-shadow: 0 var(--text-25) var(--text-80) rgba(8, 30, 55, 0.12);
    }

    .section-title {
        color: var(--primary-theme-light);
        font-size: var(--text-20);
        font-weight: 700;
        padding-bottom: var(--text-12);
        border-bottom: 3px solid;
        border-image: linear-gradient(90deg, var(--secondry-theme), var(--primary-theme)) 1;
        margin-bottom: var(--text-20);
        display: inline-block;
        width: 100%;
        font-family: var(--primary-font);
    }

    /* Form Inputs Modern Style */
    .input-field {
        width: 100%;
        padding: 14px 18px;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        font-size: 15px;
        transition: all 0.3s ease;
        background: #f8fafc;
    }

    .input-field:focus {
        outline: none;
        border-color: #3b82f6;
        background: white;
        box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        transform: translateY(-1px);
    }

    .input-field:hover {
        border-color: #cbd5e0;
    }

    .label-field {
        display: block;
        margin-bottom: 8px;
        color: #334155;
        font-weight: 600;
        font-size: 14px;
    }

    /* Modern Select Dropdown */
    .modern-select {
        cursor: pointer;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236366f1' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
        background-position: right 12px center;
        background-repeat: no-repeat;
        background-size: 20px;
        appearance: none;
    }

    .modern-select option {
        padding: 10px;
    }

    /* Upload Header Section */
    .upload-header-section {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .upload-header-icon {
        font-size: 18px;
        color: #1e40af;
    }

    .upload-header-title {
        font-size: 18px;
        font-weight: 700;
        color: #374151;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* Large Upload Zone */
    .main-upload-zone {
        background: linear-gradient(135deg, #93c5fd 0%, #dbeafe 100%);
        border-radius: 20px;
        padding: 80px 40px;
        text-align: center;
        position: relative;
        transition: all 0.3s ease;
        cursor: pointer;
        margin: 20px 0;
        box-shadow: 0 8px 32px rgba(147, 197, 253, 0.2);
        /* Ensure drag and drop works */
        pointer-events: auto;
        user-select: none;
    }

    .main-upload-zone:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 40px rgba(147, 197, 253, 0.3);
    }

    .gradient-icon-container {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 20px;
    }

    .gradient-icon-svg {
        width: 80px;
        height: 60px;
        filter: drop-shadow(0 4px 12px rgba(30, 64, 175, 0.2));
    }

    /* Upload Instructions Section */
    .upload-instructions-section {
        text-align: center;
        margin: 30px 0;
    }

    .upload-instructions-title {
        font-size: 16px;
        color: #374151;
        font-weight: 700;
        margin-bottom: 8px;
        text-transform: uppercase;
    }

    .upload-instructions-text {
        font-size: 16px;
        color: #374151;
        font-weight: 500;
        margin-bottom: 8px;
        line-height: 1.5;
    }

    .browse-link {
        background: none;
        border: none;
        color: #374151;
        border: 1px solid #374151;
        border-radius: 4px;
        padding: 2px 8px;
        cursor: pointer;
        font-weight: 500;
        font-size: 16px;
        text-decoration: none;
        margin-left: 4px;
    }

    .browse-link:hover {
        background: #374151;
        color: white;
    }

    .upload-support-text {
        font-size: 14px;
        color: #6b7280;
        font-weight: 400;
        margin: 0;
    }

    /* Custom Design Section */
    .custom-design-section {
        background: #ffffff;
        padding: 24px;
        border-radius: 12px;
        text-align: center;
        border: 1px solid #e5e7eb;
        margin-top: 20px;
    }

    .custom-design-header {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        margin-bottom: 8px;
    }

    .custom-design-icon {
        font-size: 16px;
        color: #374151;
    }

    .custom-design-question {
        font-size: 16px;
        color: #374151;
        font-weight: 500;
    }

    .custom-design-description {
        font-size: 14px;
        color: #6b7280;
        font-weight: 400;
        margin-bottom: 16px;
        opacity: 0.8;
    }

    .custom-design-btn {
        background: #ffffff;
        border: 1px solid #374151;
        border-radius: 25px;
        padding: 12px 24px;
        color: #374151;
        font-weight: 500;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
    }

    .custom-design-btn:hover {
        background: #374151;
        color: white;
    }

    .custom-design-btn i {
        font-size: 14px;
    }

    .icon-container {
        position: relative;
        display: inline-block;
        margin-bottom: 20px;
    }

    .main-icon {
        font-size: 64px;
        color: #3b82f6;
        animation: float 3s ease-in-out infinite;
        filter: drop-shadow(0 4px 8px rgba(59, 130, 246, 0.3));
    }

    .overlay-icon {
        position: absolute;
        top: -8px;
        right: -8px;
        font-size: 24px;
        color: #10b981;
        background: white;
        border-radius: 50%;
        width: 24px;
        height: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        animation: pulse 2s infinite;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    @keyframes pulse {

        0%,
        100% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.1);
        }
    }

    .upload-text strong {
        font-size: 22px;
        color: #1e293b;
        display: block;
        margin-bottom: 8px;
        font-weight: 700;
    }

    .upload-subtext {
        font-size: 16px;
        color: #64748b;
        font-weight: 500;
    }

    /* File Types */
    .file-types {
        display: flex;
        justify-content: center;
        gap: 8px;
        margin: 15px 0 10px;
        flex-wrap: wrap;
    }

    .file-type {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: white;
        backdrop-filter: blur(10px);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .file-type.pdf {
        background: linear-gradient(135deg, #ef4444, #dc2626);
    }

    .file-type.image {
        background: linear-gradient(135deg, #3b82f6, #2563eb);

    }

    .file-type.vector {
        background: linear-gradient(135deg, #10b981, #059669);
    }

    .file-size-limit {
        font-size: 13px;
        color: #64748b;
        margin-top: 10px;
        font-weight: 600;
    }

    /* Progress Bar */
    .upload-progress {
        margin-top: 20px;
        opacity: 0;
        animation: fadeIn 0.3s ease forwards;
    }

    @keyframes fadeIn {
        to {
            opacity: 1;
        }
    }

    .progress-bar {
        width: 100%;
        height: 8px;
        background: #e5e7eb;
        border-radius: 10px;
        overflow: hidden;
        margin-bottom: 10px;
    }

    .progress-fill {
        height: 100%;
        background: linear-gradient(90deg, #3b82f6, #8b5cf6);
        border-radius: 10px;
        width: 0%;
        animation: loadProgress 2s linear infinite;
    }

    @keyframes loadProgress {
        0% {
            width: 0%;
        }

        50% {
            width: 60%;
        }

        100% {
            width: 100%;
        }
    }

    .progress-text {
        font-size: 14px;
        color: #3b82f6;
        font-weight: 600;
    }

    /* Upload Tips */
    .upload-tips {
        margin-top: 25px;
        padding-top: 20px;
        border-top: 2px solid #e5e7eb;
        display: grid;
        gap: 12px;
    }

    .tip-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px;
        background: rgba(59, 130, 246, 0.05);
        border-radius: 12px;
        transition: all 0.3s ease;
        border-left: 4px solid #3b82f6;
    }

    .tip-item:hover {
        background: rgba(59, 130, 246, 0.1);
        transform: translateX(5px);
    }

    .tip-item i {
        color: #3b82f6;
        font-size: 16px;
        width: 20px;
        text-align: center;
    }

    .tip-item span {
        color: #374151;
        font-size: 14px;
        font-weight: 500;
        line-height: 1.4;
    }

    /* Color Customization */
    .color-customization {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        padding: 25px;
        border-radius: 16px;
        border: 2px solid #e5e7eb;
        position: relative;
        overflow: hidden;
    }

    .color-customization::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #3b82f6, #8b5cf6, #10b981, #f59e0b);
    }

    .color-group {
        margin-bottom: 20px;
    }

    .color-picker-wrapper {
        display: flex;
        align-items: center;
        gap: 15px;
        background: white;
        padding: 15px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        border: 2px solid #e5e7eb;
        transition: all 0.3s ease;
    }

    .color-picker-wrapper:hover {
        border-color: #3b82f6;
        box-shadow: 0 6px 20px rgba(59, 130, 246, 0.1);
        transform: translateY(-2px);
    }

    .color-picker {
        width: 50px;
        height: 50px;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
        overflow: hidden;
    }

    .color-picker:hover {
        transform: scale(1.1);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
    }

    .color-picker::-webkit-color-swatch-wrapper {
        padding: 0;
    }

    .color-picker::-webkit-color-swatch {
        border: none;
        border-radius: 50%;
    }

    .color-preview {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: 3px solid #ffffff;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s ease;
    }

    .color-hex {
        font-family: 'Courier New', monospace;
        font-weight: 700;
        font-size: 16px;
        color: #374151;
        background: rgba(255, 255, 255, 0.8);
        padding: 6px 12px;
        border-radius: 20px;
        border: 1px solid #e5e7eb;
    }


    /* File Preview */
    .file-preview {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        padding: 20px;
        border-radius: 12px;
        margin-top: 20px;
        animation: slideIn 0.3s ease;
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* New Minimalist Upload Design */
    .upload-design-section {
        background: #f7fafc;
        padding: 0;
        border-radius: 0;
        border: none;
        overflow: hidden;
    }

    .upload-header {
        background: transparent;
        padding: 25px 30px 15px;
        display: flex;
        align-items: center;
        gap: 15px;
        justify-content: space-between;
    }

    .upload-header-icon {
        font-size: 24px;
        color: #2d3748;
        opacity: 0.8;
    }

    .upload-header-title {
        font-size: 18px;
        font-weight: 700;
        color: #2d3748;
        margin: 0;
        text-transform: uppercase;
        letter-spacing: 1px;
        flex: 1;
        text-align: center;
    }

    .upload-header-add {
        font-size: 20px;
        color: #3182ce;
        opacity: 0.7;
    }

    .upload-card {
        background: white;
        margin: 0 25px 25px;
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        overflow: hidden;
    }

    .drop-zone {
        position: relative;
        padding: 60px 40px;
        text-align: center;
    }

    .drop-zone-label {
        display: block;
        cursor: pointer;
        border: 2px dashed #cbd5e0;
        border-radius: 8px;
        padding: 40px 20px;
        transition: all 0.3s ease;
        background: #fafafa;
    }

    .drop-zone-label:hover {
        border-color: #3182ce;
        background: #edf2f7;
    }

    .upload-icon-image {
        margin-bottom: 20px;
    }

    .icon-frame {
        width: 64px;
        height: 48px;
        background: #e2e8f0;
        border-radius: 8px;
        margin: 0 auto;
        position: relative;
        display: flex;
        align-items: flex-end;
        justify-content: flex-start;
    }

    .icon-mountain {
        position: absolute;
        bottom: 0;
        left: 8px;
        width: 48px;
        height: 20px;
        background: #4a5568;
        border-radius: 0 0 50% 0;
    }

    .icon-sun {
        position: absolute;
        top: 8px;
        left: 12px;
        width: 12px;
        height: 12px;
        background: #4a5568;
        border-radius: 50%;
    }

    .upload-instruction {
        margin-bottom: 15px;
    }

    .instruction-text {
        font-size: 16px;
        color: #4a5568;
        font-weight: 500;
    }

    .browse-text {
        font-size: 16px;
        color: #3182ce;
        text-decoration: underline;
        font-weight: 600;
        margin-left: 4px;
    }

    .file-support-text {
        font-size: 14px;
        color: #718096;
        font-weight: 400;
    }

    .upload-hidden-input {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer;
    }

    .upload-progress-minimal {
        background: #e2e8f0;
        height: 4px;
        overflow: hidden;
    }

    .progress-minimal {
        height: 100%;
        background: linear-gradient(90deg, #3182ce, #63b3ed);
        width: 0%;
        transition: width 0.3s ease;
    }

    .file-preview-minimal {
        margin: 20px 25px;
        background: white;
        border-radius: 8px;
        padding: 15px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }

    .file-info-minimal {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .file-icon-minimal {
        width: 40px;
        height: 40px;
        background: #edf2f7;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #4a5568;
    }

    .file-details-minimal {
        flex: 1;
    }

    .file-name-minimal {
        font-weight: 500;
        color: #2d3748;
        margin-bottom: 2px;
    }

    .file-size-minimal {
        font-size: 12px;
        color: #718096;
    }

    .remove-file-minimal {
        background: #fed7d7;
        color: #c53030;
        border: none;
        border-radius: 4px;
        width: 28px;
        height: 28px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .remove-file-minimal:hover {
        background: #feb2b2;
    }

    .design-guidelines-minimal {
        margin: 20px 25px 25px;
    }

    .guidelines-tip {
        background: #e6f3ff;
        color: #2b6cb0;
        padding: 12px 16px;
        border-radius: 6px;
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
        border-left: 3px solid #3182ce;
    }

    .guidelines-tip i {
        font-size: 16px;
    }

    /* Clean Drop Zone Design (Second Screenshot Style) */
    .clean-drop-card {
        background: white;
        margin: 25px;
        border-radius: 20px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        overflow: hidden;
        position: relative;
    }

    .drop-zone-container {
        position: relative;
        padding: 0;
    }

    .clean-drop-label {
        display: block;
        cursor: pointer;
        border: 2px dashed #d1d5db;
        border-radius: 16px;
        padding: 80px 40px;
        text-align: center;
        transition: all 0.3s ease;
        background: #fafafa;
        margin: 20px;
        position: relative;
    }

    .clean-drop-label:hover {
        border-color: #3b82f6;
        background: #eff6ff;
    }

    .drop-content {
        position: relative;
        z-index: 2;
    }

    .image-icon-clean {
        margin: 0 auto 30px;
        display: flex;
        justify-content: center;
    }

    .icon-square-clean {
        width: 80px;
        height: 60px;
        background: linear-gradient(135deg, #93c5fd 0%, #60a5fa 100%);
        border-radius: 12px;
        position: relative;
        display: flex;
        align-items: flex-end;
        justify-content: flex-start;
        box-shadow: 0 4px 12px rgba(147, 197, 253, 0.3);
    }

    .mountain-clean {
        position: absolute;
        bottom: 8px;
        left: 12px;
        width: 56px;
        height: 24px;
        background: #1e40af;
        border-radius: 0 0 60% 0;
        opacity: 0.9;
    }

    .sun-clean {
        position: absolute;
        top: 10px;
        left: 14px;
        width: 14px;
        height: 14px;
        background: #1e40af;
        border-radius: 50%;
        opacity: 0.8;
    }

    .drop-text-clean {
        margin-bottom: 15px;
        font-size: 18px;
        color: #374151;
        font-weight: 500;
        line-height: 1.5;
    }

    .drop-text-main {
        color: #374151;
        font-weight: 500;
    }

    .browse-text-clean {
        color: #3b82f6;
        text-decoration: underline;
        font-weight: 600;
        margin-left: 6px;
        cursor: pointer;
    }

    .support-text-clean {
        font-size: 14px;
        color: #6b7280;
        font-weight: 400;
        opacity: 0.8;
    }

    .file-input-clean {
        position: absolute;
        top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    cursor: pointer;
    z-index: 3;
}

/* Professional Upload Design */
.file-upload-area {
    border: 2px dashed #d1d5db;
    border-radius: 12px;
    padding: 30px;
    background: #fafbfc;
    transition: all 0.3s ease;
    cursor: pointer;
    position: relative;
}

.file-upload-area:hover {
    border-color: #3b82f6;
    background: #eff6ff;
}

.upload-dropzone {
    position: relative;
    text-align: center;
}

.dropzone-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 15px;
}

.upload-icon-display {
    font-size: 48px;
    color: #6b7280;
    margin-bottom: 10px;
}

.upload-text-display {
    margin-bottom: 8px;
}

.upload-main-text {
    font-size: 16px;
    color: #374151;
    font-weight: 500;
}

.upload-browse-link {
    font-size: 16px;
    color: #3b82f6;
    text-decoration: underline;
    font-weight: 600;
    margin-left: 6px;
    cursor: pointer;
}

.upload-file-support {
    font-size: 14px;
    color: #6b7280;
    margin-bottom: 20px;
}

.upload-button-area {
    display: flex;
    align-items: center;
    gap: 15px;
}

.upload-button {
    background: #f3f4f6;
    border: 1px solid #d1d5db;
    border-radius: 6px;
    padding: 10px 16px;
    font-size: 14px;
    font-weight: 500;
    color: #374151;
    cursor: pointer;
    transition: all 0.2s ease;
}

.upload-button:hover {
    background: #e5e7eb;
    border-color: #9ca3af;
}

.no-file-text {
    font-size: 14px;
    color: #6b7280;
}

.file-preview-section {
    margin-top: 20px;
    padding: 15px;
    background: #f0f9ff;
    border: 1px solid #bae6fd;
    border-radius: 8px;
}

.preview-info {
    display: flex;
    align-items: center;
    gap: 12px;
}

.preview-icon {
    font-size: 20px;
    color: #0369a1;
}

.preview-details {
    flex: 1;
}

.preview-name {
    font-weight: 500;
    color: #0c4a6e;
    margin-bottom: 2px;
}

.preview-size {
    font-size: 12px;
    color: #0369a1;
}

.preview-remove {
    background: #fee2e2;
    color: #dc2626;
    border: none;
    border-radius: 4px;
    width: 28px;
    height: 28px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s ease;
}

.preview-remove:hover {
    background: #fecaca;
}

.design-guidelines-section {
    margin-top: 15px;
}

.guidelines-info {
    background: #e6f3ff;
    color: #1e40af;
    padding: 12px 16px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 14px;
    border-left: 3px solid #3b82f6;
}

.guidelines-info i {
    font-size: 16px;
}

    .file-info {
        display: flex;
        align-items: center;
        color: white;
    }

    .file-info i {
        font-size: 24px;
        margin-right: 15px;
    }

    .file-details {
        flex: 1;
    }

    .file-name {
        font-weight: 600;
        margin-bottom: 4px;
    }

    .file-size {
        font-size: 13px;
        opacity: 0.9;
    }

    .remove-file {
        background: rgba(255, 255, 255, 0.2);
        border: none;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        color: white;
        cursor: pointer;
        transition: all 0.2s;
    }

    .remove-file:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: scale(1.1);
    }

    /* Modern Button */
    .modern-btn {
        background-color: var(--secondry-theme);
        border: none;
        padding: var(--text-18) var(--text-30);
        font-size: var(--text-18);
        font-weight: 700;
        border-radius: var(--text-14);
        transition: all 0.3s ease;
        box-shadow: 0 var(--text-10) var(--text-30) rgba(207, 164, 12, 0.3);
        position: relative;
        overflow: hidden;
        color: var(--primary-theme-light);
        font-family: var(--secondry-font);
    }

    .modern-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transition: left 0.5s;
    }

    .modern-btn:hover::before {
        left: 100%;
    }

    .modern-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 var(--text-15) var(--text-40) rgba(207, 164, 12, 0.4);
        background-color: var(--primary-theme);
        color: var(--default-color);
    }

    .modern-btn:active {
        transform: translateY(0);
    }

    /* Preview Container */
    .preview-container {
        background: white;
        border-radius: var(--text-20);
        padding: var(--text-35);
        box-shadow: 0 var(--text-20) var(--text-60) rgba(8, 30, 55, 0.08);
        position: relative;
        z-index: 100;
        max-height: calc(100vh - var(--text-40));
        overflow-y: auto;
    }

    .sticky-preview {
        position: relative;
        z-index: 100;
    }

    /* Custom sticky behavior */
    .preview-container.sticky-active {
        position: fixed;
        top: 20px;
        /* Width and dimensions will be preserved from original state */
        /* Position will be set dynamically by JavaScript */
    }

    .preview-canvas-wrapper {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        padding: 30px;
        border-radius: 16px;
        box-shadow: inset 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .preview-canvas-container {
        position: relative;
        /* background: white;
        border-radius: 12px; */
        overflow: hidden;
        /* box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1); */
    }

    #business-card-preview {
        width: 100%;
        height: auto;
        display: block;
        transition: transform 0.3s ease;
        /* background: white;
        border: 2px solid #e5e7eb; */
    }

    /* Custom Quantity Field */
    #custom-quantity-field {
        background: #f8fafc;
        border-radius: 12px;
        padding: 20px;
        border: 2px solid #e2e8f0;
        transition: all 0.3s ease;
    }

    #custom-quantity-field.show {
        border-color: #3b82f6;
        background: #eff6ff;
    }

    #custom_quantity_select {
        border: 2px solid #e2e8f0;
        transition: border-color 0.3s ease;
    }

    #custom_quantity_select:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    .preview-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        pointer-events: none;
    }

    .preview-overlay img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }

    /* Quality Indicator */
    .quality-status {
        display: inline-block;
        padding: 6px 16px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white;
    }

    .quality-status.warning {
        background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
    }

    .quality-status.error {
        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    }

    /* Preview Controls */
    .preview-controls .btn-group {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        overflow: hidden;
    }

    .preview-controls .btn {
        border: none;
        padding: 10px 16px;
        transition: all 0.2s;
    }

    .preview-controls .btn:hover {
        background: #3b82f6;
        color: white;
    }

    /* Custom Design Banner */
    .custom-design-banner {
        background: #fefce8;
        border: 1px solid #d4a574;
        border-radius: 12px;
        padding: 24px;
        text-align: center;
        transition: all 0.3s ease;
    }

    .custom-design-banner:hover {
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        transform: translateY(-2px);
    }

    .banner-header {
        margin-bottom: 8px;
    }

    .banner-header i {
        color: #d4a574;
        font-size: 16px;
    }

    .banner-subtitle {
        color: #8b6f47;
        font-size: 14px;
        font-weight: 500;
    }

    .banner-title {
        color: #8b6f47;
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 20px;
        line-height: 1.4;
    }

    .btn-custom-design {
        background: #fef3c7;
        color: #2d3748;
        border: 1px solid #8b6f47;
        border-radius: 25px;
        padding: 12px 24px;
        font-weight: 600;
        font-size: 14px;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-custom-design:hover {
        background: #fde68a;
        color: #2d3748;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .btn-custom-design i {
        font-size: 14px;
    }

    /* Alert Styling */
    .alert-info {
        background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
        border: 3px solid #3b82f6;
        border-radius: 16px;
        padding: 24px;
        color: #1e40af;
        box-shadow: 0 6px 20px rgba(59, 130, 246, 0.1);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .alert-info::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 5px;
        height: 100%;
        background: linear-gradient(to bottom, #3b82f6, #1d4ed8);
    }

    .alert-info:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 30px rgba(59, 130, 246, 0.2);
    }

    .alert-info i {
        color: #3b82f6;
        font-size: 18px;
        margin-right: 10px;
    }

    /* Design Guidelines */
    .design-guidelines {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        padding: 24px;
        border-radius: 16px;
        border-left: 5px solid #3b82f6;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        margin-top: 15px;
        transition: all 0.3s ease;
    }

    .design-guidelines:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }

    .design-guidelines ul {
        margin: 0;
        padding-left: 24px;
    }

    .design-guidelines li {
        margin-bottom: 10px;
        font-weight: 500;
        color: #374151;
    }

    .design-guidelines small {
        font-weight: 600;
        color: #1f2937;
    }

    /* Design Type Toggle */
    .design-type-toggle .btn-group {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        overflow: hidden;
    }

    .design-type-toggle .btn {
        border: none;
        padding: 12px 20px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .design-type-toggle .btn.active {
        background: #3b82f6;
        color: white;
        box-shadow: 0 2px 8px rgba(59, 130, 246, 0.3);
    }

    .design-type-toggle .btn:not(.active) {
        background: #f8fafc;
        color: #6b7280;
    }

    .design-type-toggle .btn:not(.active):hover {
        background: #e5e7eb;
        color: #374151;
    }

    /* Design Upload Sections */
    .design-upload-section {
        transition: all 0.3s ease;
    }

    .design-upload-section.hidden {
        display: none !important;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .contact-form-container {
            padding: 24px;
            border-radius: 16px;
        }

        .col-lg-6:first-child {
            margin-right: 0;
            padding-right: 15px;
        }

        .col-lg-6:last-child {
            padding-left: 15px;
        }

        .preview-container {
            position: relative;
            z-index: 100;
            max-height: calc(100vh - 20px);
        }

        .preview-container.sticky-active {
            position: fixed;
            top: 10px;
            left: 10px;
            right: 10px;
            width: auto;
            max-width: none;
        }

        .section-title {
            font-size: 18px;
        }

        .modern-btn {
            padding: 14px 24px;
            font-size: 16px;
        }

        .file-upload-label {
            padding: 35px 20px;
        }

        .upload-icon {
            font-size: 36px;
        }
    }

    .text-align-group {
    margin: 1rem 0;
    }

    .align-label {
    display: block;
    font-weight: 600;
    margin-bottom: 0.4rem;
    }

    .align-buttons {
    display: flex;
    gap: 8px;
    }

    .align-btn {
    width: 40px;
    height: 40px;
    border: 1px solid #ccc;
    background: #f8f9fa;
    border-radius: 6px;
    font-size: 18px;
    cursor: pointer;
    transition: all 0.2s ease;
    }

    .align-btn:hover {
    background: #e9ecef;
    }

    .align-btn.active {
    background: #007bff;
    color: white;
    border-color: #007bff;
    }

    @media (max-width: 480px) {
        .contact-form-container {
            padding: 20px;
        }

        .preview-canvas-wrapper {
            padding: 20px;
        }

        .input-field {
            padding: 12px 14px;
            font-size: 14px;
        }
    }
</style>
@section('content')
    <!-- ======= Main Section ======= -->
    <main class="inner-bg">
        <section class="inner-banner">
            <div class="container">
                <h1 class="heading fs-74" data-aos="fade-down" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                    Edit Your <span>Business Card</span></h1>
            </div>
        </section>
    </main>

    <!-- Business Card Order Form Section -->
    <section class="contact-form py-150">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <span class="btn des-wrapper mb-30" data-aos="flip-up" data-aos-easing="ease-out-cubic"
                        data-aos-duration="1000">Professional Printing</span>
                    <p class="mb-60" data-aos="fade-down" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                        Get professional business cards printed with your custom design. Upload your design file and we'll
                        handle the rest.
                    </p>
                </div>
            </div>

            <!-- Main Content Grid -->
            <div class="row">
                <!-- Order Form Column -->
                <div class="col-lg-6">
                    <div class="contact-form-container">
                        <form id="business-card-order-form" class="form-horizontal" method="POST"
                            action="{{ route('business-cards.update', $businessCard) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            @php
                                $designData = $businessCard->design_data ? json_decode($businessCard->design_data, true) : [];
                            @endphp
                            <!-- Hidden Fields for Business Card Data -->
                             <input type="hidden" name="template_id" value="{{ $businessCard->template_id }}">
                            <input type="hidden" name="design_data" value="{}">
                            <input type="hidden" name="card_id" value="{{ $businessCard->id }}">
                            <input type="hidden" name="is_front_design" value="1">

                            <!-- 1. Contact Information -->
                            <div class="order-section mb-5">
                                <h4 class="section-title mb-4">
                                    <i class="fas fa-user me-2 text-primary-theme-light"></i>
                                    Contact Information
                                </h4>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="field-wrapper mb-3">
                                            <label for="name" class="label-field">Full Name 
                                               <span
                                                    class="text-danger">*</span></label>
                                            <input class="input-field" type="text" name="name"
                                                id="name" placeholder="Enter your full name" value="{{ old('name', $businessCard->name) }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="field-wrapper">
                                            <label for="job_title" class="label-field">Professional Title</label>
                                            <input class="input-field" type="text" name="job_title" id="job_title"
                                                placeholder="Manager, CEO, Designer, etc." value="{{ old('job_title', $businessCard->job_title) }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="field-wrapper">
                                            <label for="company" class="label-field">Company Name</label>
                                            <input class="input-field" type="text" name="company" id="company"
                                                placeholder="Your Company" value="{{ old('company', $businessCard->company) }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="field-wrapper">
                                            <label for="phone" class="label-field">Phone Number</label>
                                            <input class="input-field" type="tel" name="phone"
                                                id="phone" placeholder="+1 (555) 123-4567" value="{{ old('phone', $businessCard->phone) }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="field-wrapper">
                                        <label for="email" class="label-field">Email Address <span
                                            class="text-danger">*</span></label>
                                            <input class="input-field" type="email" name="email"
                                                id="email" placeholder="your.email@company.com" value="{{ old('email', $businessCard->email) }}">
                                        </div>
                                    </div> 

                                    <div class="col-lg-6">
                                        <div class="field-wrapper">
                                            <label for="phone" class="label-field">Fonts</label>
                                            <select class="input-field form-select modern-select" name="font_family_select"
                                                id="font_family_select">
                                                <option value="">Select Font...</option>
                                                <option value="Arial" {{ $businessCard->text_font == 'Arial' ? 'selected' : '' }}>Arial</option>
                                                <option value="Verdana" {{ $businessCard->text_font == 'Verdana' ? 'selected' : '' }}>Verdana</option>
                                                <option value="Tahoma" {{ $businessCard->text_font == 'Tahoma' ? 'selected' : '' }}>Tahoma</option>
                                                <option value="Trebuchet MS" {{ $businessCard->text_font == 'Trebuchet MS' ? 'selected' : '' }}>Trebuchet MS</option>
                                                <option value="Georgia" {{ $businessCard->text_font == 'Georgia' ? 'selected' : '' }}>Georgia</option>
                                                <option value="Times New Roman" {{ $businessCard->text_font == 'Times New Roman' ? 'selected' : '' }}>Times New Roman</option>
                                                <option value="Courier New" {{ $businessCard->text_font == 'Courier New' ? 'selected' : '' }}>Courier New</option>
                                                <option value="Lucida Console" {{ $businessCard->text_font == 'Lucida Console' ? 'selected' : '' }}>Lucida Console</option>
                                                <option value="Comic Sans MS" {{ $businessCard->text_font == 'Comic Sans MS' ? 'selected' : '' }}>Comic Sans MS</option>
                                                <option value="Impact" {{ $businessCard->text_font == 'Impact' ? 'selected' : '' }}>Impact</option>
                                                <option value="Palatino Linotype" {{ $businessCard->text_font == 'Palatino Linotype' ? 'selected' : '' }}>Palatino Linotype</option>
                                                <option value="Segoe UI" {{ $businessCard->text_font == 'Segoe UI' ? 'selected' : '' }}>Segoe UI</option>
                                                <option value="Candara" {{ $businessCard->text_font == 'Candara' ? 'selected' : '' }}>Candara</option>
                                                <option value="Garamond" {{ $businessCard->text_font == 'Garamond' ? 'selected' : '' }}>Garamond</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="field-wrapper">
                                            <label for="shape" class="label-field">Shape</label>
                                            <select class="input-field form-select modern-select" name="card_shape"
                                                id="card_shape">
                                                <option value="">Select Shape...</option>
                                                <option value="standard" {{ $businessCard->card_shape == 'standard' ? 'selected' : '' }}>Standard</option>
                                                <option value="square" {{ $businessCard->card_shape == 'square' ? 'selected' : '' }}>Square</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="field-wrapper">
                                            <label for="orientation" class="label-field">Orientation</label>
                                            <select class="input-field form-select modern-select" name="card_orientation"
                                                id="card_orientation">
                                                <option value="">Select Orientation...</option>
                                                <option value="horizontal" {{ $businessCard->card_orientation == 'horizontal' ? 'selected' : '' }}>Horizontal</option>
                                                <option value="vertical" {{ $businessCard->card_orientation == 'vertical' ? 'selected' : '' }}>Vertical</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="field-wrapper">
                                            <label for="weight" class="label-field">Weight</label>
                                            <select class="input-field form-select modern-select" name="card_weight"
                                                id="card_weight">
                                                <option value="">Select Weight...</option>
                                                <option value="14pt" {{ $businessCard->card_weight == '14pt' ? 'selected' : '' }}>14pt</option>
                                                <option value="16pt" {{ $businessCard->card_weight == '16pt' ? 'selected' : '' }}>16pt</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="field-wrapper">
                                        <label for="email" class="label-field">Text Alignment<span
                                            class="text-danger">*</span></label>
                                            <button type="button" id="align-left" class="align-btn {{ $businessCard->text_alignment == 'left' ? 'active' : '' }}" data-align="left">🡰</button>
                                            <button type="button" id="align-center" class="align-btn {{ $businessCard->text_alignment == 'center' ? 'active' : '' }}" data-align="center">⭯</button>
                                            <button type="button" id="align-right" class="align-btn {{ $businessCard->text_alignment == 'right' ? 'active' : '' }}" data-align="right">🡲</button>
                                        </div>
                                        <input type="hidden" name="text_alignment" id="text_alignment" value="{{$businessCard->text_alignment}}">
                                    </div> 
                                    <div class="col-lg-12">
                                        <div class="field-wrapper">
                                            <label for="address" class="label-field">Business Address</label>
                                            <textarea class="input-field text-area" name="address" id="address" rows="2"
                                                placeholder="Enter your business address">{{ old('address', $businessCard->address) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- 2. Paper Stock Selection -->
                            <div class="order-section mb-5">
                                <h4 class="section-title mb-4">
                                    <i class="fas fa-copy me-2 text-primary-theme-light"></i>
                                    Choose Paper Stock
                                </h4>
                                <div class="field-wrapper">
                                    <label for="paper_stock_select" class="label-field">Paper Stock <span
                                            class="text-danger">*</span></label>
                                    <select class="input-field form-select modern-select" name="paper_stock"
                                        id="paper_stock_select">
                                        <option value="">Select paper stock...</option>
                                        <option value="matte" data-price="25" {{ $latestOrder->paper_stock == 'matte' ? 'selected' : '' }}>Matte - Professional finish, no glare ($25/100 cards)</option>
                                        <option value="glossy" data-price="30" {{ $latestOrder->paper_stock == 'glossy' ? 'selected' : '' }}>Glossy - High-gloss finish, vibrant colors ($30/100 cards)</option>
                                        <option value="premium" data-price="45" {{ $latestOrder->paper_stock == 'premium' ? 'selected' : '' }}>Premium - Thick card stock, luxury feel ($45/100 cards)</option>
                                        <option value="kraft" data-price="35" {{ $latestOrder->paper_stock == 'kraft' ? 'selected' : '' }}>Kraft - Eco-friendly, natural finish ($35/100 cards)</option>
                                        <option value="plastic" data-price="53" {{ $latestOrder->paper_stock == 'plastic' ? 'selected' : '' }}>Plastic - Plastic finish ($53/100 cards)</option>
                                    </select>
                                </div>
                            </div>

                            <!-- 3. Corner Style -->
                            <div class="order-section mb-5">
                                <h4 class="section-title mb-4">
                                    <i class="fas fa-square me-2 text-primary-theme-light"></i>
                                    Corner Style
                                </h4>

                                <div class="field-wrapper">
                                    <label for="corner_style_select" class="label-field">Corners <span
                                            class="text-danger">*</span></label>
                                    <select class="input-field form-select modern-select" name="corner_style"
                                        id="corner_style_select">
                                        <option value="">Select corner style...</option>
                                        <option value="standard" {{ $latestOrder->corner_style == 'standard' ? 'selected' : '' }}>Standard - Sharp, square corners</option>
                                        <option value="rounded" {{ $latestOrder->corner_style == 'rounded' ? 'selected' : '' }}>Rounded - Smooth, rounded corners (+$0.02/card)</option>
                                    </select>
                                </div>
                            </div>

                            <!-- 4. Quantity Selection -->
                            <div class="order-section mb-5">
                                <h4 class="section-title mb-4">
                                    <i class="fas fa-layer-group me-2 text-primary-theme-light"></i>
                                    Select Quantity
                                </h4>

                                <div class="field-wrapper">
                                    <label for="quantity_select" class="label-field">Quantity <span
                                            class="text-danger">*</span></label>
                                    <select class="input-field form-select modern-select" name="quantity"
                                        id="quantity_select">
                                        <option value="">Select quantity...</option>
                                        <option value="50" {{ $latestOrder->quantity == '50' ? 'selected' : '' }}>50 cards</option>
                                        <option value="100" {{ $latestOrder->quantity == '100' ? 'selected' : '' }}>100 cards</option>
                                        <option value="200" {{ $latestOrder->quantity == '200' ? 'selected' : '' }}>200 cards</option>
                                        <option value="500" {{ $latestOrder->quantity == '500' ? 'selected' : '' }}>500 cards</option>
                                        <option value="1000" {{ $latestOrder->quantity == '1000' ? 'selected' : '' }}>1,000 cards</option>
                                        <option value="2000" {{ $latestOrder->quantity == '2000' ? 'selected' : '' }}>2,000 cards</option>
                                        <option value="5000" {{ $latestOrder->quantity == '5000' ? 'selected' : '' }}>5,000 cards</option>
                                        <option value="10000" {{ $latestOrder->quantity == '10000' ? 'selected' : '' }}>10,000 cards</option>
                                        <option value="15000" {{ $latestOrder->quantity == '15000' ? 'selected' : '' }}>15,000 cards</option> 
                                        <option value="custom" {{ $latestOrder->quantity == 'custom' ? 'selected' : '' }}>Custom Quantity (15,000+)</option>
                                    </select>
                                </div>
                                
                                <!-- Custom Quantity Dropdown Field -->
                                <div class="field-wrapper mt-3" id="custom-quantity-field" style="display: none;">
                                    <label for="custom_quantity_select" class="label-field">Select Custom Quantity <span class="text-danger">*</span></label>
                                    <select class="input-field form-select modern-select" name="custom_quantity" id="custom_quantity_select">
                                        <option value="">Choose quantity...</option>
                                        <option value="20000" {{ $latestOrder->quantity == '20000' ? 'selected' : '' }}>20,000 cards</option>
                                        <option value="25000" {{ $latestOrder->quantity == '25000' ? 'selected' : '' }}>25,000 cards</option>
                                        <option value="30000" {{ $latestOrder->quantity == '30000' ? 'selected' : '' }}>30,000 cards</option>
                                        <option value="35000" {{ $latestOrder->quantity == '35000' ? 'selected' : '' }}>35,000 cards</option>
                                        <option value="40000" {{ $latestOrder->quantity == '40000' ? 'selected' : '' }}>40,000 cards</option>
                                        <option value="45000" {{ $latestOrder->quantity == '45000' ? 'selected' : '' }}>45,000 cards</option>
                                        <option value="50000" {{ $latestOrder->quantity == '50000' ? 'selected' : '' }}>50,000 cards</option>
                                    </select>
                                    <small class="text-muted">Available quantities for large orders</small>
                                </div>
                            </div>

                            <!-- Upload Your Design Section -->
                            <div class="order-section mb-5">
                                <!-- Header -->
                                <div class="upload-header-section mb-4">
                                    <i class="fas fa-cloud-upload-alt upload-header-icon"></i>
                                    <span class="upload-header-title">UPLOAD YOUR DESIGN</span>
                                </div>

                                <!-- Design Type Toggle -->
                                <div class="design-type-toggle mb-4">
                                    <div class="btn-group w-100" role="group">
                                        <button type="button" id="front-design-btn" class="btn btn-outline-primary active">
                                            <i class="fas fa-id-card me-2"></i>Front Design
                                        </button>
                                        <button type="button" id="back-design-btn" class="btn btn-outline-secondary">
                                            <i class="fas fa-id-card-alt me-2"></i>Back Design
                                        </button>
                                    </div>
                                </div>

                                <!-- Front Design Upload -->
                                <div id="front-design-section" class="design-upload-section">
                                    <div class="field-wrapper">
                                        <!-- Large Upload Zone -->
                                        <div class="main-upload-zone" id="uploadArea">
                                            <div class="gradient-icon-container">
                                                <!-- Gradient-style Icon -->
                                                <svg viewBox="0 0 80 60" fill="none" xmlns="http://www.w3.org/2000/svg" class="gradient-icon-svg">
                                                    <rect x="0" y="0" width="80" height="60" rx="8" fill="#93c5fd"/>
                                                    <circle cx="20" cy="18" r="8" fill="#1e40af"/>
                                                    <path d="M15 45 L25 40 L35 45 L45 40 L55 50 L65 40 L75 42" height="25" fill="#1e40af"/>
                                                </svg>
                                            </div>
                                            
                                            <input type="file" name="upload_files[]" id="fileInput" multiple accept=".pdf,.png,.jpg,.jpeg,.jp2" class="d-none">
                                        </div>

                                        <!-- Upload Instructions -->
                                        <div class="upload-instructions-section">
                                            <h5 class="upload-instructions-title">UPLOAD FRONT DESIGN</h5>
                                            <p class="upload-instructions-text">
                                                Drop your front design here, or <button type="button" class="browse-link" id="browseBtn">browse</button>
                                            </p>
                                            <p class="upload-support-text">Supports: JPG, JPEG2000, PNG</p>
                                        </div>

                                        <!-- File Preview Section -->
                                        <div id="file-preview" class="file-preview-section" style="display: none;">
                                            <div class="file-preview-minimal">
                                                <div class="file-info-minimal">
                                                    <div class="file-icon-minimal">
                                                        <i class="fas fa-file-image"></i>
                                                    </div>
                                                    <div class="file-details-minimal">
                                                        <div class="file-name-minimal" id="file-name">File Name</div>
                                                        <div class="file-size-minimal" id="file-size">File Size</div>
                                                    </div>
                                                    <button type="button" class="remove-file-btn" onclick="removeFile('front')">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Upload Progress -->
                                        <div id="upload-progress" class="upload-progress" style="display: none;">
                                            <div class="upload-progress-minimal">
                                                <div class="progress-minimal progress-fill"></div>
                                            </div>
                                            <div class="progress-text">Uploading...</div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Back Design Upload -->
                                <div id="back-design-section" class="design-upload-section" style="display: none;">
                                    <div class="field-wrapper">
                                        <!-- Large Upload Zone -->
                                        <div class="main-upload-zone" id="backUploadArea">
                                            <div class="gradient-icon-container">
                                                <!-- Gradient-style Icon -->
                                                <svg viewBox="0 0 80 60" fill="none" xmlns="http://www.w3.org/2000/svg" class="gradient-icon-svg">
                                                    <rect x="0" y="0" width="80" height="60" rx="8" fill="#fbbf24"/>
                                                    <circle cx="20" cy="18" r="8" fill="#d97706"/>
                                                    <path d="M15 45 L25 40 L35 45 L45 40 L55 50 L65 40 L75 42" height="25" fill="#d97706"/>
                                                </svg>
                                            </div>
                                            
                                            <input type="file" name="back_upload_files[]" id="backFileInput" multiple accept=".pdf,.png,.jpg,.jpeg,.jp2" class="d-none">
                                        </div>

                                        <!-- Upload Instructions -->
                                        <div class="upload-instructions-section">
                                            <h5 class="upload-instructions-title">UPLOAD BACK DESIGN</h5>
                                            <p class="upload-instructions-text">
                                                Drop your back design here, or <button type="button" class="browse-link" id="backBrowseBtn">browse</button>
                                            </p>
                                            <p class="upload-support-text">Supports: JPG, JPEG2000, PNG</p>
                                        </div>

                                        <!-- File Preview Section -->
                                        <div id="back-file-preview" class="file-preview-section" style="display: none;">
                                            <div class="file-preview-minimal">
                                                <div class="file-info-minimal">
                                                    <div class="file-icon-minimal">
                                                        <i class="fas fa-file-image"></i>
                                                    </div>
                                                    <div class="file-details-minimal">
                                                        <div class="file-name-minimal" id="back-file-name">File Name</div>
                                                        <div class="file-size-minimal" id="back-file-size">File Size</div>
                                                    </div>
                                                    <button type="button" class="remove-file-btn" onclick="removeFile('back')">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Upload Progress -->
                                        <div id="back-upload-progress" class="upload-progress" style="display: none;">
                                            <div class="upload-progress-minimal">
                                                <div class="progress-minimal progress-fill"></div>
                                            </div>
                                            <div class="progress-text">Uploading...</div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Custom Design Banner -->
                                <div class="custom-design-section">
                                    <div class="custom-design-header">
                                        <i class="fas fa-lightbulb custom-design-icon"></i>
                                        <span class="custom-design-question">Need a Custom Design?</span>
                                    </div>
                                    <p class="custom-design-description">Don't have a design ready? We offer custom design services!</p>
                                    <button type="button" class="custom-design-btn" onclick="window.location.href='{{ route('contact-us') }}'">
                                        <i class="fas fa-phone"></i>
                                        Contact Us for Custom Design
                                    </button>
                                </div>
                            </div>


                            <!-- 6. Color Customization -->
                            <div class="order-section mb-5">
                                <h4 class="section-title mb-4">
                                    <i class="fas fa-palette me-2 text-primary-theme-light"></i>
                                    Color Customization
                                </h4>

                                <div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="color-group">
                                                <label class="label-field">Text Color</label>
                                                <div class="color-picker-wrapper">
                                                    <input type="color" id="text-color" name="text_color" value="{{$latestOrder->text_color}}" class="color-picker"> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="color-group">
                                                <label class="label-field">Background Color</label>
                                                <div class="color-picker-wrapper">
                                                    <input type="color" id="background-color" name="background_color"
                                                        value="{{$latestOrder->background_color}}" class="color-picker">
                                                    {{-- <div class="color-preview" id="background-color-preview"
                                                        style="background-color: #ffffff;"></div>
                                                    <span class="color-hex" id="background-color-hex">#ffffff</span> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- 7. Special Instructions -->
                            <div class="order-section mb-5">
                                <h4 class="section-title mb-4">
                                    <i class="fas fa-sticky-note me-2 text-primary-theme-light"></i>
                                    Special Instructions
                                </h4>

                                <div class="field-wrapper">
                                    <label for="special_instructions" class="label-field">Add any special printing
                                        instructions or notes (optional)</label>
                                    <textarea class="input-field text-area" name="notes" id="notes" rows="3"
                                        placeholder="Enter any special requirements...">{{$latestOrder->notes}}</textarea>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="order-section">
                                <button type="submit" id="add-to-cart-btn"
                                    class="btn primary-btn border-0 w-100 btn-lg">
                                    <i class="fas fa-save me-2"></i>Update Business Card - <span
                                        id="total-price">${{$latestOrder->total_price}}</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Live Preview Column -->
                <div class="col-lg-6">
                    <div class="preview-container sticky-preview">
                        <div class="preview-header text-center mb-4">
                            <span class="btn des-wrapper mb-20">Live Preview</span>
                            <h4 class="heading fs-32 mb-30">Your Business Card</h4>
                        </div>

                        <!-- Preview Canvas Container -->
                        <div class="preview-canvas-wrapper">
                            <div class="preview-canvas-container">
                                <canvas id="business-card-preview" width="700" height="400"></canvas>
                            </div>

                            <!-- Preview Info -->
                            <!-- <div class="preview-info text-center mt-3">
                                <small class="text-muted">Standard Size: 3.5" × 2"</small>
                                <div class="preview-quality-indicator mt-2">
                                    <span id="preview-quality" class="quality-status warning">Upload Design</span>
                                </div>
                            </div> -->

                            <!-- Preview Controls -->
                            <div class="preview-controls mt-3 text-center">
                                <!-- Front/Back Toggle -->
                                <div class="btn-group mb-3" role="group">
                                    <button type="button" id="preview-front-btn" class="btn btn-sm btn-primary">
                                        <i class="fas fa-id-card me-1"></i>Front
                                    </button>
                                    <button type="button" id="preview-back-btn" class="btn btn-sm btn-outline-secondary">
                                        <i class="fas fa-id-card-alt me-1"></i>Back
                                    </button>
                                </div>
                                
                                <!-- Zoom Controls -->
                                <div class="btn-group" role="group">
                                    <button type="button" id="zoom-out-preview"
                                        class="btn btn-sm btn-outline-secondary">
                                        <i class="fas fa-search-minus"></i>
                                    </button>
                                    <span class="btn btn-sm btn-outline-primary disabled"
                                        id="zoom-level-preview">100%</span>
                                    <button type="button" id="zoom-in-preview" class="btn btn-sm btn-outline-secondary">
                                        <i class="fas fa-search-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Preview Options -->
                        <div class="preview-options mt-4">
                            <div class="row">
                                <div class="col-6">
                                    <button type="button" id="download-preview" class="btn btn-outline-primary w-100">
                                        <i class="fas fa-download me-2"></i>Download
                                    </button>
                                </div>
                                <div class="col-6">
                                    <button type="button" id="fullscreen-preview"
                                        class="btn btn-outline-secondary w-100">
                                        <i class="fas fa-expand me-2"></i>Full Screen
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Success Modal -->
    <div id="success-modal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Success!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Your business card order has been added to cart!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Continue Shopping</button>
                    <a href="{{ route('cart') }}" class="btn btn-primary">Go to Cart</a>
                </div>
            </div>
        </div>
    </div>
@endsection
 
    <script>
        
        function urlToFile(url, filename = 'image.png', mimeType = 'image/png') {
            return fetch(url)
                .then(res => res.blob())
                .then(blob => new File([blob], filename, { type: mimeType }))
                .catch(err => {
                    console.error('Error converting URL to File:', err);
                    return null;
                });
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Pricing configuration
            const pricing = {
                matte: 25.00,
                glossy: 30.00,
                premium: 45.00,
                kraft: 35.00,
                plastic: 53.00,
            };
            
            let currentSelection = {
                paperStock: "{{$latestOrder->paper_stock}}",
                borderStyle: '',
                quantity: "{{$latestOrder->quantity}}",
                frontDesignFile: "{{ $businessCard->background_front_image ? asset('storage/business_cards/' . $businessCard->background_front_image) : '' }}",
                backDesignFile: "{{ $businessCard->background_back_image ? asset('storage/business_cards/' . $businessCard->background_back_image) : '' }}",
                textColor: "{{$latestOrder->text_color}}",
                backgroundColor: "{{$latestOrder->background_color}}",
                cornerStyle: "{{$latestOrder->corner_style}}", // Default to standard corners
                currentDesignType: 'front', // 'front' or 'back'
                currentPreviewType: 'front', // 'front' or 'back'
                // Contact information
                fullName: "{{ old('name', $businessCard->name) }}",
                email: "{{ old('name', $businessCard->email) }}",
                phone: "{{ old('name', $businessCard->phone) }}",
                company: "{{ old('name', $businessCard->company) }}",
                jobTitle: "{{ old('job_title', $businessCard->job_title) }}",
                address: "{{ old('address', $businessCard->address) }}",
                fontFamily: "{{$businessCard->text_font}}",
                textAlign: "{{$businessCard->text_alignment}}"
            };
            
            if (currentSelection.frontDesignFile) {
                urlToFile(
                    currentSelection.frontDesignFile,
                    "{{ basename($businessCard->card_front_image) }}",
                    'image/png'
                ).then(file => {
                    if (file) {
                        currentSelection.frontDesignFile = file;
                        console.log('✅ frontDesignFile converted:', file);
                    }
                });
            }

            if (currentSelection.backDesignFile) {
                urlToFile(
                    currentSelection.backDesignFile,
                    "{{ basename($businessCard->card_back_image) }}",
                    'image/png'
                ).then(file => {
                    if (file) {
                        currentSelection.backDesignFile = file;
                        console.log('✅ backDesignFile converted:', file);
                    }
                });
            }
            // Initialize preview canvas
            const previewCanvas = document.getElementById('business-card-preview');
            const previewCtx = previewCanvas.getContext('2d');
            let previewZoom = 1;

            // Initialize canvas with proper dimensions
            console.log('Canvas dimensions:', previewCanvas.width, 'x', previewCanvas.height);

            // Initialize event listeners
            setupEventListeners();

            // Initialize custom sticky behavior
            setupStickyPreview();

            // Force initial preview render
            setTimeout(() => {
                console.log('Rendering initial preview...');
                try {
                    updatePreview();
                } catch (error) {
                    console.error('Preview render error:', error);
                    // Fallback: simple preview
                    previewCtx.fillStyle = '#ffffff';
                    previewCtx.fillRect(0, 0, previewCanvas.width, previewCanvas.height);
                    previewCtx.fillStyle = '#333333';
                    previewCtx.font = 'bold 24px Arial';
                    previewCtx.fillText('Business Card Preview', 50, 200);
                }
            }, 100);

            const fontSelect = document.getElementById('font_family_select');
            if (fontSelect) {
                fontSelect.addEventListener('change', function() {
                    currentSelection.fontFamily = this.value;
                    updatePreview();
                });
            }
            function setupEventListeners() {
                // Contact information fields
                document.getElementById('name').addEventListener('input', function() {
                    currentSelection.fullName = this.value;
                    updatePreview();
                });

                document.getElementById('email').addEventListener('input', function() {
                    currentSelection.email = this.value;
                    updatePreview();
                });

                document.getElementById('phone').addEventListener('input', function() {
                    currentSelection.phone = this.value;
                    updatePreview();
                });

                document.getElementById('company').addEventListener('input', function() {
                    currentSelection.company = this.value;
                    updatePreview();
                });

                document.getElementById('job_title').addEventListener('input', function() {
                    currentSelection.jobTitle = this.value;
                    updatePreview();
                });

                document.getElementById('address').addEventListener('input', function() {
                    currentSelection.address = this.value;
                    updatePreview();
                });

                // Paper stock dropdown
                document.getElementById('paper_stock_select').addEventListener('change', function() {
                    currentSelection.paperStock = this.value;
                    updateOrderSummary();
                    updatePreview();
                });

                // Corner style dropdown
                const cornerStyleSelect = document.getElementById('corner_style_select');
                if (cornerStyleSelect) {
                    console.log('Corner style select element found');
                    cornerStyleSelect.addEventListener('change', function() {
                        console.log('Corner style changed to:', this.value);
                        currentSelection.cornerStyle = this.value;
                        updateOrderSummary();
                        updatePreview();
                    });
                } else {
                    console.error('Corner style select element not found');
                }

                const phoneInput = document.getElementById('phone');

                if (phoneInput) {
                phoneInput.addEventListener('input', function(e) {
                    let input = e.target.value.replace(/\D/g, '');
                    if (input.startsWith('1')) {
                    input = input.substring(1);
                    }

                    let formatted = '+1 ';
                    if (input.length > 0) {
                    formatted += '(' + input.substring(0, 3);
                    }
                    if (input.length >= 4) {
                    formatted += ') ' + input.substring(3, 6);
                    }
                    if (input.length >= 7) {
                    formatted += '-' + input.substring(6, 10);
                    }

                    e.target.value = formatted;
                    currentSelection.phone = formatted;
                    updatePreview();
                });
                }
                // Quantity dropdown
                document.getElementById('quantity_select').addEventListener('change', function() {
                    const customQuantityField = document.getElementById('custom-quantity-field');
                    const customQuantitySelect = document.getElementById('custom_quantity_select');
                    
                    if (this.value === 'custom') {
                        // Show custom quantity dropdown field
                        customQuantityField.style.display = 'block';
                        customQuantitySelect.required = true;
                    } else {
                        // Hide custom quantity dropdown field
                        customQuantityField.style.display = 'none';
                        customQuantitySelect.required = false;
                        customQuantitySelect.value = '';
                        
                        // Set quantity from dropdown
                        currentSelection.quantity = parseInt(this.value);
                        updateOrderSummary();
                    }
                });

                // Custom quantity dropdown
                document.getElementById('custom_quantity_select').addEventListener('change', function() {
                    if (this.value) {
                        currentSelection.quantity = parseInt(this.value);
                        updateOrderSummary();
                        //console.log('Custom quantity selected:', this.value);
                    }
                });

                // File upload
                const fileInput = document.getElementById('fileInput');
                if (fileInput) {
                    //console.log('File input found, setting up change listener...');
                    fileInput.addEventListener('change', handleFileUpload);
                } else {
                    //console.error('File input not found');
                }

                // Browse button click handler
                const browseBtn = document.getElementById('browseBtn');
                if (browseBtn) {
                    //console.log('Browse button found, setting up click listener...');
                    browseBtn.addEventListener('click', function(e) {
                        e.preventDefault();
                        //console.log('Browse button clicked');
                        const fileInput = document.getElementById('fileInput');
                        if (fileInput) {
                            fileInput.click();
                        } else {
                            //console.error('File input not found when browse clicked');
                        }
                    });
                } else {
                    //console.error('Browse button not found');
                }

                // Upload area click handler
                const uploadAreaClick = document.getElementById('uploadArea');
                if (uploadAreaClick) {
                    //console.log('Upload area found for click handler...');
                    uploadAreaClick.addEventListener('click', function(e) {
                        // Don't trigger if clicking on the browse button
                        if (e.target.id !== 'browseBtn') {
                            //console.log('Upload area clicked');
                            const fileInput = document.getElementById('fileInput');
                            if (fileInput) {
                                fileInput.click();
                            } else {
                                //console.error('File input not found when upload area clicked');
                            }
                        }
                    });
                } else {
                    //console.error('Upload area not found for click handler');
                }

                // Drag and drop file upload
                const uploadArea = document.getElementById('uploadArea');
                
                if (uploadArea) {
                    //console.log('Upload area found, setting up drag and drop...');
                    
                    uploadArea.addEventListener('dragover', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        //console.log('Drag over detected');
                        this.style.transform = 'translateY(-2px)';
                        this.style.boxShadow = '0 12px 40px rgba(147, 197, 253, 0.4)';
                        this.style.border = '2px dashed #3b82f6';
                    });

                    uploadArea.addEventListener('dragleave', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        //console.log('Drag leave detected');
                        this.style.transform = 'translateY(0)';
                        this.style.boxShadow = '0 8px 32px rgba(147, 197, 253, 0.2)';
                        this.style.border = 'none';
                    });

                    uploadArea.addEventListener('drop', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        //console.log('Drop detected');
                        this.style.transform = 'translateY(0)';
                        this.style.boxShadow = '0 8px 32px rgba(147, 197, 253, 0.2)';
                        this.style.border = 'none';

                        const files = e.dataTransfer.files;
                        //console.log('Files dropped:', files.length);
                        
                        if (files.length > 0) {
                            // Create a new FileList-like object
                            const fileInput = document.getElementById('fileInput');
                            if (fileInput) {
                                // Clear existing files
                                fileInput.value = '';
                                
                                // Create a new DataTransfer object
                                const dataTransfer = new DataTransfer();
                                for (let i = 0; i < files.length; i++) {
                                    dataTransfer.items.add(files[i]);
                                }
                                fileInput.files = dataTransfer.files;
                                
                                // Trigger the file upload handler
                                handleFileUpload({
                                    target: {
                                        files: fileInput.files
                                    }
                                });
                            } else {
                                //console.error('File input not found');
                            }
                        }
                    });
                } else {
                    //console.error('Upload area not found');
                }

                // Form submission
                document.getElementById('business-card-order-form').addEventListener('submit', handleFormSubmit);

                // Preview controls
                setupPreviewControls();

                // Color picker events
                setupColorPickers();

                // Front/Back design toggle
                setupDesignTypeToggle();

                // Back design file upload
                setupBackDesignUpload();
            }

            function setupTextAlignmentControls() {
                const alignButtons = document.querySelectorAll('.align-btn');

                alignButtons.forEach(button => {
                    button.addEventListener('click', function() {
                    // Remove 'active' class from all
                    alignButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');

                    const selectedAlign = this.dataset.align;
                    currentSelection.textAlign = selectedAlign;
                    document.getElementById('text_alignment').value = selectedAlign;
                    //console.log('Text alignment changed to:', selectedAlign);
                    updatePreview();
                    });
                });
            }
            setupTextAlignmentControls();
            function setupStickyPreview() {
                const previewContainer = document.querySelector('.preview-container');
                const formContainer = document.querySelector('.contact-form-container');
                
                if (!previewContainer || !formContainer) {
                    //console.log('Preview or form container not found');
                    return;
                }

                let isSticky = false;
                let originalTop = previewContainer.offsetTop;
                let originalLeft = previewContainer.offsetLeft;
                let originalWidth = previewContainer.offsetWidth;
                let originalHeight = previewContainer.offsetHeight;

                function handleScroll() {
                    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                    const formBottom = formContainer.offsetTop + formContainer.offsetHeight;
                    
                    // Check if we should make it sticky
                    if (scrollTop > originalTop - 20 && scrollTop < formBottom - previewContainer.offsetHeight) {
                        if (!isSticky) {
                            isSticky = true;
                            previewContainer.classList.add('sticky-active');
                            
                            // Preserve original dimensions and position
                            previewContainer.style.width = originalWidth + 'px';
                            previewContainer.style.height = originalHeight + 'px';
                            previewContainer.style.left = originalLeft + 'px';
                            previewContainer.style.right = 'auto';
                            
                            //console.log('Preview made sticky at original position:', originalLeft, 'with size:', originalWidth + 'x' + originalHeight);
                        }
                    } else {
                        if (isSticky) {
                            isSticky = false;
                            previewContainer.classList.remove('sticky-active');
                            previewContainer.style.left = '';
                            previewContainer.style.right = '';
                            previewContainer.style.width = '';
                            previewContainer.style.height = '';
                            //console.log('Preview unstuck - dimensions reset');
                        }
                    }
                }

                // Add scroll listener
                window.addEventListener('scroll', handleScroll);
                
                // Add resize listener to recalculate position
                window.addEventListener('resize', function() {
                    if (isSticky) {
                        // Preserve original position and dimensions on resize
                        previewContainer.style.left = originalLeft + 'px';
                        previewContainer.style.width = originalWidth + 'px';
                        previewContainer.style.height = originalHeight + 'px';
                    }
                });
                
                // Initial check
                handleScroll();
            }

            function setupColorPickers() {
                // Text color picker
                const textColorPicker = document.getElementById('text-color');
                
                if (textColorPicker) {
                    //console.log('Text color picker found');
                    textColorPicker.addEventListener('input', function() {
                        const color = this.value;
                        //console.log('Text color changed to:', color);
                        currentSelection.textColor = color;
                        updatePreview();
                    });
                } else {
                    //console.error('Text color picker not found');
                }

                // Background color picker
                const backgroundColorPicker = document.getElementById('background-color');
                
                if (backgroundColorPicker) {
                    //console.log('Background color picker found');
                    backgroundColorPicker.addEventListener('input', function() {
                        const color = this.value;
                        //console.log('Background color changed to:', color);
                        currentSelection.backgroundColor = color;
                        updatePreview();
                    });
                } else {
                    //console.error('Background color picker not found');
                }
            }

            function setupDesignTypeToggle() {
                // Front design button
                const frontDesignBtn = document.getElementById('front-design-btn');
                const backDesignBtn = document.getElementById('back-design-btn');
                const frontDesignSection = document.getElementById('front-design-section');
                const backDesignSection = document.getElementById('back-design-section');

                if (frontDesignBtn && backDesignBtn) {
                    frontDesignBtn.addEventListener('click', function() {
                        currentSelection.currentDesignType = 'front';
                        
                        // Update button states
                        frontDesignBtn.classList.add('active');
                        frontDesignBtn.classList.remove('btn-outline-secondary');
                        frontDesignBtn.classList.add('btn-outline-primary');
                        
                        backDesignBtn.classList.remove('active');
                        backDesignBtn.classList.remove('btn-outline-primary');
                        backDesignBtn.classList.add('btn-outline-secondary');
                        
                        // Show/hide sections
                        frontDesignSection.style.display = 'block';
                        backDesignSection.style.display = 'none';
                    });

                    backDesignBtn.addEventListener('click', function() {
                        currentSelection.currentDesignType = 'back';
                        
                        // Update button states
                        backDesignBtn.classList.add('active');
                        backDesignBtn.classList.remove('btn-outline-secondary');
                        backDesignBtn.classList.add('btn-outline-primary');
                        
                        frontDesignBtn.classList.remove('active');
                        frontDesignBtn.classList.remove('btn-outline-primary');
                        frontDesignBtn.classList.add('btn-outline-secondary');
                        
                        // Show/hide sections
                        frontDesignSection.style.display = 'none';
                        backDesignSection.style.display = 'block';
                    });
                }
            }

            function setupBackDesignUpload() {
                // Back file input
                const backFileInput = document.getElementById('backFileInput');
                if (backFileInput) {
                    backFileInput.addEventListener('change', handleBackFileUpload);
                }

                // Back browse button
                const backBrowseBtn = document.getElementById('backBrowseBtn');
                if (backBrowseBtn) {
                    backBrowseBtn.addEventListener('click', function(e) {
                        e.preventDefault();
                        const backFileInput = document.getElementById('backFileInput');
                        if (backFileInput) {
                            backFileInput.click();
                        }
                    });
                }

                // Back upload area click handler
                const backUploadArea = document.getElementById('backUploadArea');
                if (backUploadArea) {
                    backUploadArea.addEventListener('click', function(e) {
                        if (e.target.id !== 'backBrowseBtn') {
                            const backFileInput = document.getElementById('backFileInput');
                            if (backFileInput) {
                                backFileInput.click();
                            }
                        }
                    });
                }

                // Back drag and drop
                if (backUploadArea) {
                    backUploadArea.addEventListener('dragover', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        this.style.transform = 'translateY(-2px)';
                        this.style.boxShadow = '0 12px 40px rgba(251, 191, 36, 0.4)';
                        this.style.border = '2px dashed #f59e0b';
                    });

                    backUploadArea.addEventListener('dragleave', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        this.style.transform = 'translateY(0)';
                        this.style.boxShadow = '0 8px 32px rgba(251, 191, 36, 0.2)';
                        this.style.border = 'none';
                    });

                    backUploadArea.addEventListener('drop', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        this.style.transform = 'translateY(0)';
                        this.style.boxShadow = '0 8px 32px rgba(251, 191, 36, 0.2)';
                        this.style.border = 'none';

                        const files = e.dataTransfer.files;
                        if (files.length > 0) {
                            const backFileInput = document.getElementById('backFileInput');
                            if (backFileInput) {
                                backFileInput.value = '';
                                const dataTransfer = new DataTransfer();
                                for (let i = 0; i < files.length; i++) {
                                    dataTransfer.items.add(files[i]);
                                }
                                backFileInput.files = dataTransfer.files;
                                handleBackFileUpload({
                                    target: {
                                        files: backFileInput.files
                                    }
                                });
                            }
                        }
                    });
                }
            }

            function handleBackFileUpload(event) {
                console.log('handleBackFileUpload called');
                const file = event.target.files[0];
                console.log('Back file selected:', file ? file.name : 'No file');

                if (!file) {
                    console.log('No back file selected');
                    return;
                }

                // Show progress bar
                const progressContainer = document.getElementById('back-upload-progress');
                progressContainer.style.display = 'block';

                // Simulate upload progress
                simulateBackUploadProgress(file);

                // Validate file type
                const allowedTypes = ['application/pdf', 'image/png', 'image/jpeg', 'image/jpg', 'image/jp2'];
                if (!allowedTypes.includes(file.type)) {
                    showErrorMessage('Please upload a valid file type (PDF, PNG, JPG, JPEG2000)');
                    progressContainer.style.display = 'none';
                    return;
                }

                // Validate file size (50MB max)
                const maxSize = 50 * 1024 * 1024; // 50MB
                if (file.size > maxSize) {
                    showErrorMessage('File size must be less than 50MB');
                    progressContainer.style.display = 'none';
                    return;
                }

                // Show file preview after short delay
                setTimeout(() => {
                    currentSelection.backDesignFile = file;
                    showBackFilePreview(file);
                    updateOrderSummary();
                    updatePreview();
                    progressContainer.style.display = 'none';
                }, 1500);
            }

            function simulateBackUploadProgress(file) {
                const progressFill = document.querySelector('#back-upload-progress .progress-fill');
                const progressText = document.querySelector('#back-upload-progress .progress-text');

                // Reset progress
                progressFill.style.width = '0%';
                progressText.textContent = 'Preparing upload...';

                // Simulate progress steps
                setTimeout(() => {
                    progressFill.style.width = '30%';
                    progressText.textContent = 'Validating file...';
                }, 300);

                setTimeout(() => {
                    progressFill.style.width = '60%';
                    progressText.textContent = 'Uploading back design...';
                }, 800);

                setTimeout(() => {
                    progressFill.style.width = '90%';
                    progressText.textContent = 'Processing image...';
                }, 1200);

                setTimeout(() => {
                    progressFill.style.width = '100%';
                    progressText.textContent = 'Upload complete!';
                }, 1500);
            }

            function showBackFilePreview(file) {
                document.getElementById('back-file-name').textContent = file.name;
                document.getElementById('back-file-size').textContent = formatFileSize(file.size);
                document.getElementById('back-file-preview').style.display = 'block';
            }

            function handleFileUpload(event) {
                console.log('handleFileUpload called');
                const file = event.target.files[0];
                console.log('File selected:', file ? file.name : 'No file');

                if (!file) {
                    console.log('No file selected');
                    return;
                }

                // Show progress bar
                const progressContainer = document.getElementById('upload-progress');
                progressContainer.style.display = 'block';

                // Simulate upload progress
                simulateUploadProgress(file);

                // Validate file type
                const allowedTypes = ['application/pdf', 'image/png', 'image/jpeg', 'image/jpg', 'image/jp2'];
                if (!allowedTypes.includes(file.type)) {
                    showErrorMessage('Please upload a valid file type (PDF, PNG, JPG, JPEG2000)');
                    progressContainer.style.display = 'none';
                    return;
                }

                // Validate file size (50MB max)
                const maxSize = 50 * 1024 * 1024; // 50MB
                if (file.size > maxSize) {
                    showErrorMessage('File size must be less than 50MB');
                    progressContainer.style.display = 'none';
                    return;
                }

                // Show file preview after short delay
                setTimeout(() => {
                    currentSelection.frontDesignFile = file;
                    showFilePreview(file);
                    updateOrderSummary();
                    updatePreview();
                    progressContainer.style.display = 'none';
                }, 1500);
            }

            function simulateUploadProgress(file) {
                const progressFill = document.querySelector('.progress-fill');
                const progressText = document.querySelector('.progress-text');

                // Reset progress
                progressFill.style.width = '0%';
                progressText.textContent = 'Preparing upload...';

                // Simulate progress steps
                setTimeout(() => {
                    progressFill.style.width = '30%';
                    progressText.textContent = 'Validating file...';
                }, 300);

                setTimeout(() => {
                    progressFill.style.width = '60%';
                    progressText.textContent = 'Uploading design...';
                }, 800);

                setTimeout(() => {
                    progressFill.style.width = '90%';
                    progressText.textContent = 'Processing image...';
                }, 1200);

                setTimeout(() => {
                    progressFill.style.width = '100%';
                    progressText.textContent = 'Upload complete!';
                }, 1500);
            }

            function showFilePreview(file) {
                document.getElementById('file-name').textContent = file.name;
                document.getElementById('file-size').textContent = formatFileSize(file.size);
                document.getElementById('file-preview').style.display = 'block';

                // If it's an image, show preview overlay
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.getElementById('design-preview-img');
                        img.src = e.target.result;
                        document.getElementById('design-overlay').style.display = 'flex';
                        updateQualityIndicator(file);
                    };
                    reader.readAsDataURL(file);
                }
            }

            function removeFile(type = 'front') {
                if (type === 'front') {
                    document.getElementById('fileInput').value = '';
                    document.getElementById('file-preview').style.display = 'none';
                    currentSelection.frontDesignFile = null;
                } else if (type === 'back') {
                    document.getElementById('backFileInput').value = '';
                    document.getElementById('back-file-preview').style.display = 'none';
                    currentSelection.backDesignFile = null;
                }
                updateOrderSummary();
                updatePreview();
            }

            function formatFileSize(bytes) {
                if (bytes === 0) return '0 Bytes';

                const k = 1024;
                const sizes = ['Bytes', 'KB', 'MB', 'GB'];
                const i = Math.floor(Math.log(bytes) / Math.log(k));

                return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
            }

            function updateOrderSummary() {
                // Calculate and update total price
                let totalPrice = 0;
                if (currentSelection.paperStock && currentSelection.quantity) {
                    const basePrice = pricing[currentSelection.paperStock];
                    const quantityMultiplier = calculateQuantityMultiplier(currentSelection.quantity);
                    totalPrice = basePrice * quantityMultiplier;

                    // Add rounded corner cost
                    if (currentSelection.cornerStyle === 'rounded') {
                        totalPrice += currentSelection.quantity * 0.02;
                    }
                }

                document.getElementById('total-price').textContent = `$${totalPrice.toFixed(2)}`;
            }

            function calculateQuantityMultiplier(quantity) {
                // Pricing tiers (should be configurable in backend)
                if (quantity <= 100) return quantity / 100;
                if (quantity <= 500) return quantity / 100 * 0.8; // 20% discount
                if (quantity <= 1000) return quantity / 100 * 0.7; // 30% discount
                if (quantity <= 2000) return quantity / 100 * 0.6; // 40% discount
                if (quantity <= 5000) return quantity / 100 * 0.5; // 50% discount
                return quantity / 100 * 0.4; // 60% discount for large orders
            }

            // Preview functionality
            function updatePreview() {
                

                // Clear canvas
                previewCtx.clearRect(0, 0, previewCanvas.width, previewCanvas.height);

                // Apply corner clipping first if needed
                if (currentSelection.cornerStyle === 'rounded') {
                    console.log('Setting up rounded corner clipping');
                    previewCtx.save();
                    previewCtx.beginPath();
                    const radius = 20;
                    previewCtx.moveTo(radius, 0);
                    previewCtx.lineTo(previewCanvas.width - radius, 0);
                    previewCtx.quadraticCurveTo(previewCanvas.width, 0, previewCanvas.width, radius);
                    previewCtx.lineTo(previewCanvas.width, previewCanvas.height - radius);
                    previewCtx.quadraticCurveTo(previewCanvas.width, previewCanvas.height, previewCanvas.width - radius, previewCanvas.height);
                    previewCtx.lineTo(radius, previewCanvas.height);
                    previewCtx.quadraticCurveTo(0, previewCanvas.height, 0, previewCanvas.height - radius);
                    previewCtx.lineTo(0, radius);
                    previewCtx.quadraticCurveTo(0, 0, radius, 0);
                    previewCtx.closePath();
                    previewCtx.clip();
                } else {
                    console.log('Using standard corners - no clipping');
                }
                console.log('currentPreviewType...',currentSelection.backDesignFile);
                // Check if there's an uploaded image to use as background
                const currentDesignFile = currentSelection.currentPreviewType === 'front' 
                    ? currentSelection.frontDesignFile 
                    : currentSelection.backDesignFile;
                const cardstat = currentSelection.currentPreviewType;
                if (currentDesignFile && currentDesignFile.type.startsWith('image/')) {
                    // Use uploaded image as background
                    const img = new Image();
                    img.onload = function() {
                        // Draw image to fill the entire canvas
                        previewCtx.drawImage(img, 0, 0, previewCanvas.width, previewCanvas.height);
                        
                        // Add default business card content with user colors
                        if(cardstat === 'front'){
                            addDefaultCardContent();
                        }
                        // Add border for square corners to make them more visible
                        if (currentSelection.cornerStyle === 'standard') {
                            previewCtx.strokeStyle = '#333333';
                            previewCtx.lineWidth = 2;
                            previewCtx.strokeRect(1, 1, previewCanvas.width - 2, previewCanvas.height - 2);
                        }
                        
                        // Restore context if we applied clipping
                        if (currentSelection.cornerStyle === 'rounded') {
                            previewCtx.restore();
                        }
                        
                        updateQualityIndicator(currentDesignFile);
                    };
                    img.src = URL.createObjectURL(currentDesignFile);
                } else {
                    // Use user-selected background color or paper stock color
                    const backgroundColor = currentSelection.backgroundColor ||
                        (currentSelection.paperStock ? getPaperStockColor(currentSelection.paperStock) : '#ffffff');

                    // Fill background
                    previewCtx.fillStyle = backgroundColor;
                    previewCtx.fillRect(0, 0, previewCanvas.width, previewCanvas.height);

                    // Add default business card content with user colors
                    if(cardstat === 'front'){
                        addDefaultCardContent();
                    }
                    
                    // Add border for square corners to make them more visible
                    if (currentSelection.cornerStyle === 'standard') {
                        previewCtx.strokeStyle = '#333333';
                        previewCtx.lineWidth = 2;
                        previewCtx.strokeRect(1, 1, previewCanvas.width - 2, previewCanvas.height - 2);
                    }
                    
                    // Restore context if we applied clipping
                    if (currentSelection.cornerStyle === 'rounded') {
                        previewCtx.restore();
                    }
                    
                    updateQualityIndicator();
                }
            }


            function getPaperStockColor(stock) {
                const colors = {
                    matte: '#f8f9fa',
                    glossy: '#ffffff',
                    premium: '#f5f5f5',
                    kraft: '#f4e4bc',
                    plastic: '#ffffff',
                };
                return colors[stock] || '#ffffff';
            }

            function applyRoundedCornersToCanvas(ctx, width, height) {
                // Create rounded corner effect using clipping path
                ctx.globalCompositeOperation = 'destination-in';
                ctx.beginPath();
                const radius = 20;

                ctx.moveTo(radius, 0);
                ctx.lineTo(width - radius, 0);
                ctx.quadraticCurveTo(width, 0, width, radius);
                ctx.lineTo(width, height - radius);
                ctx.quadraticCurveTo(width, height, width - radius, height);
                ctx.lineTo(radius, height);
                ctx.quadraticCurveTo(0, height, 0, height - radius);
                ctx.lineTo(0, radius);
                ctx.quadraticCurveTo(0, 0, radius, 0);
                ctx.closePath();
                ctx.fill();
                ctx.globalCompositeOperation = 'source-over';
            }

            function applyRoundedCorners() {
                // Legacy function - kept for compatibility
                applyRoundedCornersToCanvas(previewCtx, previewCanvas.width, previewCanvas.height);
            }

            function addDefaultCardContent() {
                console.log('Adding default card content...');

                // Use real user data or fallback to placeholder text
                const fullName = currentSelection.fullName || 'Your Name';
                const email = currentSelection.email || 'your.email@company.com';
                const phone = currentSelection.phone || '+1 (555) 123-4567';
                const company = currentSelection.company || 'Company Name';
                const jobTitle = currentSelection.jobTitle || 'Professional Title';
                const address = currentSelection.address || 'Business Address';
                const selectedFont = currentSelection.fontFamily || 'Arial';
                let xPos;
                if (currentSelection.textAlign === 'center') {
                    xPos = previewCanvas.width / 2;
                } else if (currentSelection.textAlign === 'right') {
                    xPos = previewCanvas.width - 40;
                } else {
                    xPos = 40;
                }
                // Sample business card content for preview with user colors
                previewCtx.font = `bold 36px ${selectedFont}`;
                previewCtx.textAlign = currentSelection.textAlign || 'left';
                previewCtx.fillStyle = currentSelection.textColor || '#333333';
                //previewCtx.fillText(fullName, 40, 80);
                previewCtx.fillText(fullName, xPos, 80);

                previewCtx.font = `24px ${selectedFont}`;
                // Use a slightly lighter shade of the text color for secondary text
                const secondaryColor = lightenColor(currentSelection.textColor || '#333333', 20);
                previewCtx.fillStyle = secondaryColor;
                //previewCtx.fillText(jobTitle, 40, 120);
                previewCtx.fillText(jobTitle, xPos, 120);

                previewCtx.font = `bold 28px ${selectedFont}`;
                previewCtx.fillStyle = currentSelection.textColor || '#333333';
                //previewCtx.fillText(company, 40, 170);
                previewCtx.fillText(company, xPos, 170);

                previewCtx.font = `20px ${selectedFont}`;
                previewCtx.fillStyle = secondaryColor;
                //previewCtx.fillText(`${phone} • ${email}`, 40, 220);
                //previewCtx.fillText(address, 40, 260);
                previewCtx.fillText(`${phone} • ${email}`, xPos, 220);
                previewCtx.fillText(address, xPos, 260);

                // Add a subtle border to make the card visible
                previewCtx.strokeStyle = '#e5e7eb';
                previewCtx.lineWidth = 2;
                previewCtx.strokeRect(20, 20, previewCanvas.width - 40, previewCanvas.height - 40);

                console.log('Default content added');
            }

            function lightenColor(color, percent) {
                // Simple color lightening function
                if (color.includes('rgb')) return color; // Skip if already rgb

                // Convert hex to RGB
                const hex = color.replace('#', '');
                const r = parseInt(hex.substr(0, 2), 16);
                const g = parseInt(hex.substr(2, 2), 16);
                const b = parseInt(hex.substr(4, 2), 16);

                // Lighten
                const newR = Math.min(255, r + (r * percent / 100));
                const newG = Math.min(255, g + (g * percent / 100));
                const newB = Math.min(255, b + (b * percent / 100));

                // Convert back to hex
                return `#${Math.round(newR).toString(16).padStart(2, '0')}${Math.round(newG).toString(16).padStart(2, '0')}${Math.round(newB).toString(16).padStart(2, '0')}`;
            }

            function updateQualityIndicator(file = null) {
                const indicator = document.getElementById('preview-quality');

                if (file || currentSelection.designFile) {
                    const fileToCheck = file || currentSelection.designFile;
                    const fileSize = fileToCheck.size;
                    const fileName = fileToCheck.name.toLowerCase();

                    // Check for high-quality design indicators
                    if (fileName.includes('.pdf') || fileName.includes('.ai')) {
                        indicator.textContent = 'Print Ready';
                        indicator.className = 'quality-status';
                    } else if (fileSize > 500000) { // > 500KB
                        indicator.textContent = 'High Quality';
                        indicator.className = 'quality-status';
                    } else if (fileSize > 100000) { // > 100KB
                        indicator.textContent = 'Good Quality';
                        indicator.className = 'quality-status warning';
                    } else {
                        indicator.textContent = 'Low Quality';
                        indicator.className = 'quality-status error';
                    }
                } else {
                    indicator.textContent = 'Upload Design';
                    indicator.className = 'quality-status warning';
                }
            }

            // Preview zoom controls
            function setupPreviewControls() {
                // Front/Back preview toggle
                const previewFrontBtn = document.getElementById('preview-front-btn');
                const previewBackBtn = document.getElementById('preview-back-btn');

                if (previewFrontBtn && previewBackBtn) {
                    previewFrontBtn.addEventListener('click', function() {
                        currentSelection.currentPreviewType = 'front';
                        
                        // Update button states
                        previewFrontBtn.classList.add('btn-primary');
                        previewFrontBtn.classList.remove('btn-outline-secondary');
                        
                        previewBackBtn.classList.remove('btn-primary');
                        previewBackBtn.classList.add('btn-outline-secondary');
                        
                        updatePreview();
                    });

                    previewBackBtn.addEventListener('click', function() {
                        currentSelection.currentPreviewType = 'back';
                        console.log('show_back ..............',currentSelection)
                        // Update button states
                        previewBackBtn.classList.add('btn-primary');
                        previewBackBtn.classList.remove('btn-outline-secondary');
                        
                        previewFrontBtn.classList.remove('btn-primary');
                        previewFrontBtn.classList.add('btn-outline-secondary');
                        
                        updatePreview();
                    });
                }

                document.getElementById('zoom-in-preview').addEventListener('click', function() {
                    previewZoom = Math.min(previewZoom * 1.2, 2);
                    updatePreviewZoom();
                });

                document.getElementById('zoom-out-preview').addEventListener('click', function() {
                    previewZoom = Math.max(previewZoom / 1.2, 0.5);
                    updatePreviewZoom();
                });

                document.getElementById('download-preview').addEventListener('click', downloadPreview);
                document.getElementById('fullscreen-preview').addEventListener('click', showFullscreenPreview);
            }

            function updatePreviewZoom() {
                const scale = previewZoom;
                previewCanvas.style.transform = `scale(${scale})`;
                document.getElementById('zoom-level-preview').textContent = Math.round(previewZoom * 100) + '%';
            }

            function downloadPreview() {
                const link = document.createElement('a');
                link.download = 'business-card-preview.png';
                link.href = previewCanvas.toDataURL();
                link.click();
            }

            function showFullscreenPreview() {
                // Create fullscreen modal for preview
                const modal = document.getElementById('success-modal');
                const modalBody = modal.querySelector('.modal-body');

                // Clear modal content and add preview
                modalBody.innerHTML = `
                    <div class="text-center">
                        <h3 class="mb-3">Business Card Preview</h3>
                        <div class="mb-3">
                            <canvas id="fullscreen-preview-canvas" width="700" height="400"></canvas>
                        </div>
                        <div class="d-flex gap-3 justify-content-center">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-outline-secondary" onclick="downloadFullscreenPreview()">Download</button>
                        </div>
                    </div>
                `;

                // Copy preview to fullscreen canvas
                const fullscreenCanvas = document.getElementById('fullscreen-preview-canvas');
                const fullscreenCtx = fullscreenCanvas.getContext('2d');
                fullscreenCtx.drawImage(previewCanvas, 0, 0, fullscreenCanvas.width, fullscreenCanvas.height);

                // Show modal
                const bootstrapModal = new bootstrap.Modal(modal);
                bootstrapModal.show();
            }

            async function handleFormSubmit(event) {
                event.preventDefault();
                console.log('Form submission started...');

                // Validate required fields
                const name = document.getElementById('name').value;
                const email = document.getElementById('email').value;
                const font_family_select = document.getElementById('font_family_select').value;
                const card_shape = document.getElementById('card_shape').value;
                const card_orientation = document.getElementById('card_orientation').value;
                const card_weight = document.getElementById('card_weight').value;
                const text_alignment = document.getElementById('text_alignment').value;
                const canvas = document.getElementById('business-card-preview');
                const previewFrontBtn = document.getElementById('preview-front-btn');
                const previewBackBtn = document.getElementById('preview-back-btn');

                if (!name.trim()) {
                    showErrorMessage('Please enter your full name');
                    return;
                }
                
                if (!email.trim()) {
                    showErrorMessage('Please enter your email address');
                    return;
                }
                
                if (!currentSelection.paperStock) {
                    showErrorMessage('Please select a paper stock');
                    return;
                }

                if (!currentSelection.cornerStyle) {
                    showErrorMessage('Please select a corner style');
                    return;
                }

                if (!currentSelection.quantity) {
                    showErrorMessage('Please select a quantity');
                    return;
                }

                if (!font_family_select) {
                    showErrorMessage('Please select a font');
                    return;
                }
                
                if (!card_shape) {
                    showErrorMessage('Please select a shap');
                    return;
                }

                if (!card_orientation) {
                    showErrorMessage('Please select a orientation');
                    return;
                }

                if (!card_weight) {
                    showErrorMessage('Please select a weight');
                    return;
                }

                if (!currentSelection.frontDesignFile && !currentSelection.backDesignFile) {
                    showErrorMessage('Please upload at least one design file (front or back)');
                    return;
                }

                // Check if custom quantity is selected but not filled
                const customQuantitySelect = document.getElementById('custom_quantity_select');
                if (currentSelection.quantity === 'custom' && !customQuantitySelect.value) {
                    showErrorMessage('Please select a custom quantity');
                    return;
                }
                
                // If custom quantity is selected, use the custom quantity value
                if (currentSelection.quantity === 'custom') {
                    currentSelection.quantity = customQuantitySelect.value;
                }

                previewFrontBtn.click(); // this updates the preview to front
                await new Promise(r => setTimeout(r, 500)); // wait for render
                const frontImage = canvas.toDataURL('image/png');

                // 🟩 2️⃣ Trigger back button
                previewBackBtn.click(); // switch to back preview
                await new Promise(r => setTimeout(r, 500)); // wait for render
                const backImage = canvas.toDataURL('image/png');

                console.log('All validations passed, preparing form data...');

                // Prepare form data
                const formData = new FormData(event.target);
                
                // Ensure Laravel recognizes this as a PUT request
                formData.append('_method', 'PUT');
                
                // Add the uploaded files with correct field names
                if (currentSelection.frontDesignFile) {
                    formData.append('upload_files[]', currentSelection.frontDesignFile);
                    console.log('Front file appended to form data:', currentSelection.frontDesignFile.name);
                }
                
                if (currentSelection.backDesignFile) {
                    formData.append('back_upload_files[]', currentSelection.backDesignFile);
                    console.log('Back file appended to form data:', currentSelection.backDesignFile.name);
                }
                
                if (!currentSelection.frontDesignFile && !currentSelection.backDesignFile) {
                    console.error('No design files selected');
                }

                // Add current selection data
                formData.append('paper_stock', currentSelection.paperStock);
                formData.append('corner_style', currentSelection.cornerStyle);
                formData.append('quantity', currentSelection.quantity);
                formData.append('text_color', currentSelection.textColor);
                formData.append('background_color', currentSelection.backgroundColor);
                
                formData.append('font_family_select', font_family_select);
                formData.append('card_shape', card_shape);
                formData.append('card_orientation', card_orientation);
                formData.append('card_weight', card_weight);
                formData.append('text_alignment', text_alignment);
                formData.append('business_card_image_front', frontImage);
                formData.append('business_card_image_back', backImage);
                
                // Add design data as JSON
                const designData = {
                    paper_stock: currentSelection.paperStock,
                    corner_style: currentSelection.cornerStyle,
                    quantity: currentSelection.quantity,
                    text_color: currentSelection.textColor,
                    background_color: currentSelection.backgroundColor,
                    has_front_design: !!currentSelection.frontDesignFile,
                    has_back_design: !!currentSelection.backDesignFile,
                    notes: document.getElementById('notes').value
                };
                formData.append('design_data', JSON.stringify(designData)); 

                // Debug: Log all form data
                console.log('Form data prepared, submitting...');
                console.log('Current selection:', currentSelection);
                for (let [key, value] of formData.entries()) {
                    console.log(key, value);
                }

                // Get CSRF token
                const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content ||
                    document.querySelector('input[name="_token"]')?.value ||
                    '{{ csrf_token() }}';

                console.log('CSRF Token:', csrfToken);

                // Submit form via AJAX
                fetch("{{ route('business-cards.update', $businessCard) }}", {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(response => {
                        console.log('Response received:', response.status);
                        if (!response.ok) {
                            throw new Error(`HTTP error! status: ${response.status}`);
                        }
                        return response.json(); // Expect JSON response
                    })
                    .then(data => {
                        console.log('Response data:', data);
                        if (data.success) {
                            showSuccessMessage(data.message || 'Business card updated successfully!');
                            // Redirect to order details page after 1 second
                            setTimeout(() => {
                                window.location.href = data.redirect_url || "{{ route('cart.list') }}";
                            }, 1000);
                        } else {
                            showErrorMessage(data.message || 'An error occurred');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        showErrorMessage('An error occurred. Please try again.');
                    });
            }

            function showErrorMessage(message) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: message,
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'OK'
                });
            }

            function showSuccessMessage(message) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: message,
                    confirmButtonColor: '#28a745',
                    confirmButtonText: 'OK',
                    timer: 2000,
                    timerProgressBar: true
                });
            }

            // Make functions globally available
            window.removeFile = removeFile;

            window.downloadFullscreenPreview = function() {
                const fullscreenCanvas = document.getElementById('fullscreen-preview-canvas');
                const link = document.createElement('a');
                link.download = 'business-card-preview-large.png';
                link.href = fullscreenCanvas.toDataURL();
                link.click();
            };
        });
        window.addEventListener('load', function() {
            setTimeout(() => {
                const previewFrontBtn = document.getElementById('preview-front-btn');
                if (previewFrontBtn) previewFrontBtn.click();
            }, 500); // 0.5 sec delay
        });
    </script> 
    