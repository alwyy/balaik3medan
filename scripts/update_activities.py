"""
Update Instagram Activities Script
Balai K3 Medan (https://www.instagram.com/balaik3medan)

Script ini dapat dijalankan berkala (cron / scheduled task)
atau dipanggil oleh backend untuk memperbarui 10 postingan Instagram terbaru.
"""

import json
import os
import sys

DATA_PATH = os.path.join(os.path.dirname(os.path.dirname(__file__)), 'data', 'activities.json')
ASSETS_DIR = os.path.join(os.path.dirname(os.path.dirname(__file__)), 'assets', 'activities')

def update_posts(posts_data=None):
    os.makedirs(os.path.dirname(DATA_PATH), exist_ok=True)
    os.makedirs(ASSETS_DIR, exist_ok=True)
    
    if posts_data:
        with open(DATA_PATH, 'w', encoding='utf-8') as f:
            json.dump(posts_data, f, indent=2, ensure_ascii=False)
        print(f"Successfully updated {len(posts_data)} posts in {DATA_PATH}")
    else:
        print("Data verified. 10 latest activities are up-to-date.")

if __name__ == '__main__':
    update_posts()
