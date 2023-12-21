export interface Guide {
    id: string;
    uuid: string;
    name: string;
    nick_name: string;
    birthday: string;
    birthday_formated: string;
    phone_number: string;
    profile: string;
    province?: string;
    city?: string;
    subdistrict?: string;
    category_id?: string;
    province_id?: string;
    city_id?: string;
    subdistrict_id?: string;
    profession_id: number;
    profession: string;
    languages: string;
    status: string;
    is_member: integer;
    code: string;
    qrcode_id: string;
    is_member: boolean;
}

export interface Merchant {
    id: string;
    uuid: string;
    name: string;
    whatsapp_number: string;
    profile: string;
    siup_document: string;
    description: string;
    category?: string;
    province?: string;
    city?: string;
    subdistrict?: string;
    category_id?: string;
    province_id?: string;
    city_id?: string;
    subdistrict_id?: string;
    address: string;
    full_address: string;
    pic_name: string;
    phone_number: string;
    commission: any;
    full_commission: string;
    weekdays: any;
    weekday_time: any;
    weekends: any;
    weekend_time: any;
    status: string;
    code: string;
    qrcode_id: string;
    is_member: string;
}


export type PageProps<T extends Record<string, unknown> = Record<string, unknown>> = T & {
    auth: {
        guide: Guide;
        merchant: Merchant;
    };
    flash: {
        error?: string;
        success?: string;
        popup_success?: string;
        popup_success_subtitle?: string;
        pass_data?: any;
    },
    logo_bca: string,
    asset: string,
    bank: {
        rekening_number?: string;
        rekening_bank?: string;
        rekening_name?: string;
        whatsapp?: string;
    }
};
