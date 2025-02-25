$(function() {
    'use strict';

    // التحقق من وجود العناصر قبل تهيئة PerfectScrollbar
    const initScrollbar = (selector) => {
        const element = document.querySelector(selector);
        if (element) {
            return new PerfectScrollbar(selector, {
                useBothWheelAxes: true,
                suppressScrollX: true,
            });
        }
        return null;
    };

    // تهيئة scrollbars فقط إذا وجدت العناصر
    try {
        initScrollbar('.perfect-scrollbar');
        initScrollbar('.sidebar-right1');
        initScrollbar('#sidebar-right');
        initScrollbar('.notification-scroll');
    } catch (error) {
        console.warn('PerfectScrollbar initialization warning:', error);
    }
});
