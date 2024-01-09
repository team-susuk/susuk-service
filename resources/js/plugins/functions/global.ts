export const routeAppendParam = (params: any, silent = true) => {
    const newUrl = new URL(window.location.href);
    for (var key in params) {
         newUrl.searchParams.set(key, params[key]);
    }
    window.history.pushState({}, '', newUrl);
    if (!silent) {
        window.dispatchEvent(new Event('changeUrlParameter'));
    }
}
export const removeAllUrlParameter = (silent = true) => {
    const url = new URL(window.location.href);
    window.history.replaceState({}, document.title, `${url.origin}${url.pathname}`);
    if (!silent) {
        window.dispatchEvent(new Event('changeUrlParameter'));
    }
}
export const removeURLParameter = (params: any, silent = true) => {
    const url = new URL(window.location.href);
    for (var key in params) {
        url.searchParams.delete(params[key]);
    }
    window.history.replaceState({}, document.title, url.toString());
    if (!silent) {
        window.dispatchEvent(new Event('changeUrlParameter'));
    }
}

export const getAllQueryParameter = () => {
    const entries = new URL(window.location.href).searchParams.entries();
    const result: any = {}
    for (const [key, value] of entries) {
        result[key] = value;
    }
    return result;
}

export const getQueryParam = (key: string) => {
    return new URLSearchParams(window.location.search).get(key) || null
}

export const strSlug = (str: any, separator = '-') => {
    return str
        .toLowerCase()
        .replace(/[^\w\s]/gi, '')
        .trim()
        .replace(/\s+/g, separator);
}

export const numberFormat = (number: any) => {
    if (number) {
        number = number.toString();
        var number_string = number.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);
        if (ribuan) {
            var separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        return split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    }
    return number
}

export const fullUrl = () => {
    return window.location.href
}

export const closeFilter = () => {
    document.getElementById('cancel-filter')?.click()
}
export const closePopup = () => {
    document.getElementById('close-popup')?.click()
}

export const validateMinimumDateRange = (start: string, end: string, validate = 30) => {
    if (start && end) {
        var startDate = new Date(start);
        var endDate = new Date(end);
        if (endDate < startDate) {
            showAlert('Tanggal mulai harus lebih besar dari tanggal akhir')
            return false;
        }

        var Difference_In_Time = endDate.getTime() - startDate.getTime();
        var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
        if (Difference_In_Days > validate) {
            showAlert(`Tanggal rentang maksimum adalah ${validate}`)
            return false;
        }
    }
    return true;
}

export const base64encode = (string: any) => {
    return btoa(string);
}

export const base64decode = (string: any) => {
    return atob(string);
}
export const dateYmdFormat = (date: Date) => {
    if (date) {
        date = new Date(date)
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const day = String(date.getDate()).padStart(2, '0');
        return `${year}-${month}-${day}`;
    }
    return '-'
}

export const showAlert = (message: string, type = 'success') => {
    var color = '#2B3'
    if (type === 'error') color = '#E20000'

    let alert = document.querySelector("#alert-flash-message") as HTMLDivElement
    let alertSpan =document.querySelector("#alert-flash-message span") as HTMLDivElement
    if (alert && alertSpan) {
        alert.style.backgroundColor = color
        alertSpan.textContent = message
        const button = document.getElementById("show-alert-flash") as HTMLAnchorElement
        if (button) {
            button.click()
        }
        setTimeout(() => {
            const button = document.getElementById("hide-alert-flash") as HTMLAnchorElement
            if (button) {
                button.click()
                alert.classList.remove(color)
            }
        }, 10000);
    }
}

export const clickId = (id: string) => {
    let element = document.getElementById(id) as any
    if (element) {
        element?.click()
    }
}

export const formatIndonesianPhoneNumber = (number: any) => {
    number = number.replace(/\D/g, '');
    const start = number.substring(0, 1);
    const prefix = '62';

    if (start === '0') {
        return prefix + number.replace(/^0+/, '');
    } else {
        if (number.substring(0, 2) !== '62') {
            return prefix + number;
        }
    }
    return number;
}


export const compressImage = (file: any, maxWidth: any, maxHeight: any, outputFormat: any, quality: any, callback: any) => {
    const reader = new FileReader();
    reader.onload = function (event: any) {
        const img: any = new Image();
        img.src = URL.createObjectURL(file)

        img.onload = function () {
            // Calculate the new size to fit within the specified dimensions while maintaining the aspect ratio.
            let width = img.width;
            let height = img.height;
            if (width > maxWidth) {
                height *= maxWidth / width;
                width = maxWidth;
            }
            if (height > maxHeight) {
                width *= maxHeight / height;
                height = maxHeight;
            }

            // Create a canvas with the new size
            const canvas = document.createElement('canvas');
            canvas.width = width;
            canvas.height = height;

            // Draw the image on the canvas
            const ctx: any = canvas.getContext('2d');
            ctx.drawImage(img, 0, 0, width, height);

            // Convert the canvas to a data URL with the specified output format and quality
            const compressedImageData = canvas.toDataURL(`image/${outputFormat}`, quality);

            // Call the callback function with the compressed image data URL
            callback(dataURLtoBlob(compressedImageData));
        };

        img.src = event.target.result;
    };
    reader.readAsDataURL(file);
}

const dataURLtoBlob = (dataurl: any) => {
    var arr = dataurl.split(','), mime = arr[0].match(/:(.*?);/)[1],
        bstr = atob(arr[1]), n = bstr.length, u8arr = new Uint8Array(n);
    while(n--){
        u8arr[n] = bstr.charCodeAt(n);
    }
    return new Blob([u8arr], {type:mime});
}